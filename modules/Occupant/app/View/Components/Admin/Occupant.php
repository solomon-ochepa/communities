<?php

namespace Modules\Occupant\App\View\Components\Admin;

use Illuminate\View\Component;
use Illuminate\View\View;

class Occupant extends Component
{
    public $occupant;

    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view/contents that represent the component.
     */
    public function render(): View|string
    {
        return view('occupant::components.admin/occupant');
    }
}
