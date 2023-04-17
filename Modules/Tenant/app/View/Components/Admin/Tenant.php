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
        dd($this->tenant);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        dd(__CLASS__);

        return view('tenant::components.admin/tenant');
    }
}
