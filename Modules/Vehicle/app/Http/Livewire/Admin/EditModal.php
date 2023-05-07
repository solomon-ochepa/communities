<?php

namespace Modules\Vehicle\app\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Vehicle\app\Models\Vehicle;

class EditModal extends Component
{
    use WithFileUploads;

    public $vehicle;
    public $image;

    public function mount()
    {
        $this->init();
    }

    public function init()
    {
        $this->vehicle = new Vehicle();
    }

    public function render()
    {
        $data = [];

        // $data['roles'] = Role::whereNotIn('name', ['admin', 'super-admin'])->pluck('name', 'id')->toArray();

        return view('vehicle::livewire.admin.edit-modal', $data);
    }
}
