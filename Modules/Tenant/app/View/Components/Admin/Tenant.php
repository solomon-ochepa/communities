<?php

namespace Modules\Tenant\app\View\Components\Admin;

use Illuminate\View\Component;

class Tenant extends Component
{
    public $tenant;

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
        return view('tenant::components.admin/tenant');
    }
}
