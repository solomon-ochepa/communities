<?php

namespace App\View\Components\Layouts\App\Navbar;

use Illuminate\View\Component;

class Notifications extends Component
{
    public $data = [];

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $this->data['messages'] = collect();
        $this->data['notifications'] = collect();

        return view('components.layouts.app.navbar.notifications', $this->data);
    }
}
