<?php

namespace Modules\Menu\app\Http\Livewire\Admin;

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

        return view('menu::livewire.admin.sidebar', $this->data);
    }

    private function menu()
    {
        $menus      = Cache::remember(
            'menu.admin.sidebar',
            30,
            fn () => Menu::with('child')
                ->whereActive(1)
                ->whereNull('parent_id')
                ->orderBy('priority')->orderBy('name')
                ->get()
        );

        $html = '';
        $this->html($menus, $html);

        return $html;
    }

    private function html($menus, string &$html, $child = false)
    {
        foreach ($menus as $menu) {
            // Invalid & Empty parent menus
            if (!$menu->url or in_array($menu->url, $this->submenus) or (Str::startsWith($menu->url, '#') and !$menu->child)) {
                continue;
            }

            // permissions
            if ($menu->permissions ?? null and $this->user->cannot($menu->permissions)) {
                continue;
            }

            $level          = 0;
            $this->active   = '';
            $current_uri    = Request::fullUrl();
            $url            = $this->url($menu->url);

            // Active
            if ($menu->child->count()) {
                $level = 1;
                $menu->child->map(function ($child, $key) use ($menu, $current_uri) {
                    if (!$child->active) {
                        $menu->child->forget($key);
                        return;
                    }

                    // $route = Str::match("/('*.*.*')/i", $child->url);
                    $child_route = Str::contains($child->url, '.') ? Str::beforeLast($child->url, '.') . '.*' : '';
                    // dd($child_route ?? '');

                    if (Str::contains($current_uri, $this->url($child->url), true) or request()->routeIs($child_route)) {
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

            // Layout
            $html .= "<!-- {$menu->name} -->";
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
            if ($menu->icon and !$child) {
                $html .= "<i class='{$menu->icon}'></i>";
            }
            $html .= "<span>" . __(Str::title($menu->name)) . "</span>";
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
                $this->html($menu->child, $html, true);
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
