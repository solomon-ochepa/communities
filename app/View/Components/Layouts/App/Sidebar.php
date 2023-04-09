<?php

namespace App\View\Components\Layouts\App;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Modules\Menu\app\Models\Menu;
use Modules\User\app\Models\User;

class Sidebar extends Component
{
    public $data = [];
    public $user;
    public $submenus = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->user = User::find(auth()->user()->id);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->data['menus'] = $this->menu();

        return view('components.layouts.app.sidebar', $this->data);
    }

    private function menu()
    {
        $menus = Menu::whereActive(1)->get()->toArray();

        $menu_tree  = $this->menu_tree($menus, $this->submenus);

        $html = '';
        $this->html($menu_tree, $html);

        return $html;
    }

    private function menu_tree(array $menus, array $submenus = [])
    {
        $tree = [];

        foreach ($menus as $menu) {
            if ($menu['url'] ?? null && !isset($submenus[$menu['url']])) {
                // It's a Submenu
                if (in_array($menu['url'], $submenus)) {
                    continue;
                }

                if (($menu['url'] !== '#') && !blank($this->user) && !$this->user->can($menu['url'])) {
                    continue;
                }

                // permission
                if (isset($menu['permission']) and $this->user->cannot($menu['permission'])) {
                    continue;
                }

                if (!$menu['parent_id']) {
                    // Top level menu
                    $tree[$menu['id']] = $menu;
                } else {
                    // Sub-menu

                    // Init child array
                    if (!isset($tree[$menu['parent_id']]['child'])) {
                        $tree[$menu['parent_id']]['child'] = [];
                    }

                    // Add menu as child/sub-menu
                    $tree[$menu['parent_id']]['child'][$menu['id']] = $menu;
                }
            }
        }

        $tree = Arr::sort($tree, ['priority', 'name']);
        return $tree;
    }

    private function html(array $menu_tree, string &$html, $child = false)
    {
        foreach ($menu_tree as $menu) {
            // Empty dropdown menu
            if (!isset($menu['url']) or ($menu['url'] == '#' && !isset($menu['child']))) {
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
            $url = $this->generate_url($menu['url']);

            // Active dropdown
            if (isset($menu['child'])) {
                $level          = 1;
                $child_uri      = collect($menu['child'])->map(function ($child) {
                    $child['url'] = $this->generate_url($child['url']);
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
            } elseif (request()->routeIs($segment . '*') and $segment !== 'dashboard') {
                $active = 'active';
            }

            // Layout
            $html .= "<!-- {$menu['name']} -->";
            $html .= '<li class="' . ($child ? '' : 'menu') . '' . ($active ? ' ' . $active : '') . '">';
            if ($level) {
                $html .= "<a href='{$url}' data-bs-toggle='collapse' aria-expanded='" . ($active ? 'true' : 'false') . "' class='dropdown-toggle" . ($active ? '' : ' collapsed') . "' >";
            } else {
                $html .= "<a href='{$url}'";
                if (!$child) {
                    $html .= " aria-expanded='" . ($active ? 'true' : 'false') . "' class='dropdown-toggle'";
                }
                $html .= ">";
            }

            // start: div
            $html .= "<div class=''>";
            if ($menu['icon'] and !$child) {
                $html .= "<i class='{$menu['icon']}'></i>";
            }
            $html .= "<span>" . __(Str::title($menu['name'])) . "</span>";
            $html .= '</div>';
            // end: div

            if ($level) {
                $html .= '<div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>';
            }
            $html .= '</a>';

            if ($level) {
                $html .= '<ul class="submenu list-unstyled collapse' . ($active ? " show" : "") . '" id="' . Str::replaceFirst('#', '', $url) . '" data-bs-parent="#accordionExample">';
                $this->html($menu['child'], $html, true);
                $html .= "</ul>";
            }

            $html .= "</li>";
        }
    }

    private function generate_url($url)
    {
        if (Str::match('(/[\w~,;\-\./?%&+#=]*)', $url) or Str::startsWith($url, '#')) {
            // URL
            return url($url);
        } else {
            // Route
            if (Route::has($url)) {
                return route($url);
            } else {
                return 'javascript://' . $url;
            }
        }
    }
}
