<?php

namespace App\Http\Livewire\Property\Admin;

use Livewire\Component;

class Edit extends Component
{
    public $property;

    public function render()
    {
        return view('livewire.property.admin.edit');
    }
}
