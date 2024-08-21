<?php

namespace Modules\Visitor\app\View\Components\Admin;

use Illuminate\View\Component;

class Visitor extends Component
{
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
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('visitor::components.admin/visitor');
    }
}
