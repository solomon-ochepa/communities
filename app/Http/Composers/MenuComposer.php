<?php

namespace App\Http\Composers;

use App\Models\Menu;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\View\View;
use Illuminate\Support\Str;

class MenuComposer
{
    public $submenus = [];

    public function compose(View $view)
    {
        $view->with('sidebar_menus', $this->menu());
    }

    private function menu()
    {
        $menus = Menu::whereActive(1)->get()->toArray();

        $myMenu = '';
        $menuTree  = $this->menuTree($menus, $this->submenus);

        $this->build($menuTree, $myMenu);

        return $myMenu;
    }

    private function menuTree(array $menus, array $submenus = [])
    {
        $tree = [];
        foreach ($menus as $menu) {
            if (isset($menu['url']) && !isset($submenus[$menu['url']])) {
                if (in_array($menu['url'], $submenus)) {
                    continue;
                }

                if (($menu['url'] !== '#') && !blank(auth()->user()) && !auth()->user()->can($menu['url'])) {
                    continue;
                }

                if (!$menu['parent_id']) {
                    $tree[$menu['id']] = $menu;
                } else {
                    if (!isset($tree[$menu['parent_id']]['child'])) {
                        $tree[$menu['parent_id']]['child'] = [];
                    }

                    $tree[$menu['parent_id']]['child'][$menu['id']] = $menu;
                }
            }
        }

        $tree = Arr::sort($tree, ['priority', 'name']);
        return $tree;
    }

    private function build(array $menuTree, string &$menu)
    {
        foreach ($menuTree as $node) {
            // Empty dropdown menu
            if (!isset($node['url']) or ($node['url'] == '#' && !isset($node['child']))) {
                continue;
            }

            $level          = 0;
            $dropdown       = 'nav-item dropdown ';
            $has_dropdown   = 'has-dropdown';
            $active         = '';

            $segment        = request()->segment(2);
            $segments       = Request::segments();
            $current_route  = Route::currentRouteName();
            $current_uri    = Request::fullUrl();

            // Generate URL
            $url = $this->full_url($node['url']);

            // Active dropdown
            if (isset($node['child'])) {
                $level          = 1;
                $child_uri      = collect($node['child'])->map(function ($child) {
                    $child['url'] = $this->full_url($child['url']);
                    return $child;
                })->pluck('url')->toArray();

                if (in_array($current_uri, $child_uri) or in_array($current_route, $child_uri) or in_array($segment, $child_uri)) {
                    // Matched URI
                    $active = 'active';
                }
            }

            // Active link
            if ($current_uri == $url or $current_route == $url or $segment == $url) {
                $active = 'active';
            } elseif (request()->routeIs($segment . '*')) {
                $active = 'active';
            }

            $menu .= '<li class="' . ($level ? $dropdown : '') . $active . '">';
            $menu .= '<a class="nav-link ' . ($level ? $has_dropdown : '') . '" href="' . $url . '" >';
            $menu .= '<i class="' . ($node['icon'] ? $node['icon'] : 'fa-home') . '"></i>';
            $menu .= '<span>' . (trans('menu.' . $node['slug'])) . '</span>';
            $menu .= '</a>';

            if ($level) {
                $menu .= '<ul class="dropdown-menu">';
                $this->build($node['child'], $menu);
                $menu .= "</ul>";
            }
            $menu .= "</li>";
        }
    }

    private function full_url($url)
    {
        if (Str::match('(/[\w~,;\-\./?%&+#=]*)', $url) or Str::startsWith($url, '#')) {
            return url($url);
        } else {
            return route($url);
        }
    }
}
