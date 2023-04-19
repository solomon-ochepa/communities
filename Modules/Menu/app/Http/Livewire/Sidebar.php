<?php

namespace Modules\Menu\app\Http\Livewire;

use Livewire\Component;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Modules\Menu\app\Models\Menu;
use Modules\User\app\Models\User;

class Sidebar extends Component
{
    public $data = [];
    public $user;
    public $active = '';
    public $submenus = [];

    public function mount()
    {
        $this->user = User::find(auth()->user()->id);
    }

    protected $listeners = ['refresh_sidebar' => '$refresh'];

    public function render(): View|Closure|string
    {
        $this->data['menus'] = $this->menu();

        return view('menu::livewire.sidebar', $this->data);
    }

    private function menu()
    {
        $menus      = Cache::remember('menu.sidebar', 60, fn () => Menu::whereActive(1)->get()->toArray());
        $menu_tree  = $this->menu_tree($menus);
        $html       = '';

        $this->html($menu_tree, $html);

        return $html;
    }

    private function menu_tree(array $menus)
    {
        $menu_tree = [];

        foreach ($menus as $menu) {
            if ($menu['url'] && !in_array($menu['url'], $this->submenus)) {
                // permission
                if (isset($menu['permission']) and $this->user->cannot($menu['permission'])) {
                    continue;
                }

                if ($menu['parent_id']) {
                    // Add child/sub-menu
                    $menu_tree[$menu['parent_id']]['child'][$menu['id']] = $menu;
                } else {
                    // Top menu
                    $menu_tree[$menu['id']] = $menu;
                }
            }
        }

        $menu_tree = Arr::sort($menu_tree, ['priority']); // ? effect
        return $menu_tree;
    }

    private function html(array $menus, string &$html, $child = false)
    {
        foreach ($menus as $menu) {
            // Empty - dropdown menu
            if (!isset($menu['url']) or (Str::startsWith($menu['url'], '#') && !isset($menu['child']))) {
                continue;
            }

            $level          = 0;
            $this->active   = '';

            $segment        = request()->segment(2);
            $segments       = Request::segments();
            $current_route  = Route::currentRouteName();
            $current_uri    = Request::fullUrl();

            // Generate URL
            $url = $this->url($menu['url']);

            // Active
            if (isset($menu['child'])) {
                $level          = 1;
                collect($menu['child'])->map(function ($child) use ($current_uri, $current_route, $segment) {
                    // $route = Str::match("/('*.*.*')/i", $child['url']);
                    $child_route = Str::contains($child['url'], '.') ? Str::beforeLast($child['url'], '.') . '.*' : '';
                    // dd($child_route ?? '');

                    if (Str::contains($current_uri, $this->url($child['url']), true) or request()->routeIs($child_route)) {
                        $this->active = 'active';
                    }

                    return $child;
                });
            } else {
                $_route = '';

                if (Str::contains($current_uri, $url, true) or request()->routeIs($_route)) {
                    $this->active = 'active';
                }
            }

            // dd($this->active);

            // Layout
            $html .= "<!-- {$menu['name']} -->";
            $html .= '<li class="' . ($child ? '' : 'menu') . '' . ($this->active ? ' ' . $this->active : '') . '">';
            if ($level) {
                $html .= "<a href='{$url}' data-bs-toggle='collapse' aria-expanded='" . ($this->active ? 'true' : 'false') . "' class='dropdown-toggle" . ($this->active ? '' : ' collapsed') . "' >";
            } else {
                $html .= "<a href='{$url}'";
                if (!$child) {
                    $html .= " aria-expanded='" . ($this->active ? 'true' : 'false') . "' class='dropdown-toggle'";
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
                $html .= '<ul class="submenu list-unstyled collapse' . ($this->active ? " show" : "") . '" id="' . Str::replaceFirst('#', '', $url) . '" data-bs-parent="#accordionExample">';
                $this->html($menu['child'], $html, true);
                $html .= "</ul>";
            }

            $html .= "</li>";
        }
    }

    private function url($url)
    {
        if ($this->is_url($url) or Str::startsWith($url, '#')) {
            // is URL
            return url($url);
        } else {
            // is Route
            if (Route::has($url)) {
                return route($url);
            } else {
                return 'javascript://' . $url;
            }
        }
    }

    public function route(string $url)
    {
        if (!$this->is_url($url)) {
            if (Str::match("[\.]", $url)) {
                return Str::beforeLast($url, '.') . '.*';
            } else {
                return $url;
            }
        }
    }

    public function is_url(string $url)
    {
        return Str::match('(/[\w~,;\-\./?%&+#=]*)', $url) ? true : false;
    }
}
