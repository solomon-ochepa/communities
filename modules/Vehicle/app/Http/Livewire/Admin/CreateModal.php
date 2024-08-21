<?php

namespace Modules\Vehicle\app\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\Vehicle\app\Http\Requests\StoreVehicleRequest;
use Modules\Vehicle\app\Models\Vehicle;

class CreateModal extends Component
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
        $this->vehicle = new Vehicle;
    }

    public function render()
    {
        $data = [];

        // $data['roles'] = Role::whereNotIn('name', ['admin', 'super-admin'])->pluck('name', 'id')->toArray();

        return view('vehicle::livewire.admin.create-modal', $data);
    }

    protected function rules()
    {
        $request = new StoreVehicleRequest;

        return $request->rules();
    }

    public function updated($field, $value)
    {
        $this->validateOnly($field);
    }

    public function store()
    {
        $this->validate();

        dd(__CLASS__);

        $this->vehicle = new User($this->vehicle);
        $this->vehicle->save();
        $this->vehicle->refresh();

        if ($this->role) {
            $this->vehicle->syncRoles(2);
        }

        if ($this->image) {
            $media = MediaUploader::fromSource($this->image)
                ->useHashForFilename()
                ->toDirectory('image')
                ->upload();

            if ($media) {
                $this->vehicle->attachMedia($media, ['profile', 'image']);
            }
        }

        event(new Registered($this->vehicle));

        session()->flash('status', 'User has been created successfully.');
        $this->reset();
        $this->init();
        $this->emit('refresh');
    }
}
