<?php

namespace Modules\Gatepass\app\View\Components\Admin;

use Illuminate\View\Component;

class Gatepass extends Component
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
        return view('gatepass::components.admin/gatepass');
    }
}
