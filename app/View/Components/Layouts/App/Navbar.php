<?php

namespace App\View\Components\Layouts\App;

use Illuminate\View\Component;

class Navbar extends Component
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
        $this->data['user'] = auth()->user();

        return view('components.layouts.app.navbar', $this->data);
    }
}
