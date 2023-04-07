<?php

namespace App\View\Components\Layouts\App\Navbar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Notifications extends Component
{
    public $data = [];

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $this->data['messages'] = collect();
        $this->data['notifications'] = collect();

        return view('components.layouts.app.navbar.notifications', $this->data);
    }
}
