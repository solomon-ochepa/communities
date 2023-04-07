<?php

namespace App\View\Components\Property\Guest;

use Modules\Property\app\Models\Property;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Latest extends Component
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
        $this->data['properties'] = Property::latest()->get();

        return view('components.property.guest.latest', $this->data);
    }
}
