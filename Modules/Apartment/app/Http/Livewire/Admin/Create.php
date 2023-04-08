<?php

namespace Modules\Apartment\app\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Apartment\app\Http\Requests\StoreApartmentRequest;
use Modules\Apartment\app\Models\Apartment;

class Create extends Component
{
    public $apartment;
    public $rooms;

    public $edit = true;

    protected $listeners = ['refresh' => '$refresh'];

    protected function rules()
    {
        $request = new StoreApartmentRequest();
        return $request->rules();
    }

    public function mount()
    {
        if (!$this->apartment) {
            $this->apartment = new Apartment();
            $this->edit = false;

            $this->apartment->active = true;
        }
    }

    public function render()
    {
        return view('apartment::livewire.admin.create');
    }

    public function submit()
    {
        $this->validate();

        $exists = Apartment::where('name', $this->apartment->name)->first();
        if ($exists) {
            session()->flash('status', "Apartment already exists.");
            return;
        }

        $this->apartment->save();

        if ($this->rooms) {
            for ($i = 0; $i < $this->rooms; $i++) {
                $this->apartment->rooms()->create(['name' => 'Room ' . ($i + 1)]);
            }
        }

        $this->emitUp('refresh');

        if ($this->edit) {
            session()->flash('status', "Apartment updated successfully.");
        } else {
            session()->flash('status', "Apartment created successfully.");
            $this->reset();
        }

        $this->emit('refresh');
    }
}
