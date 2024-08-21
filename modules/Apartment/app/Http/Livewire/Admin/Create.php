<?php

namespace Modules\Apartment\app\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Apartment\app\Http\Requests\StoreApartmentRequest;
use Modules\Apartment\app\Models\Apartment;

class Create extends Component
{
    public $apartment;

    public $rooms;

    protected $listeners = ['refresh' => '$refresh'];

    protected function rules()
    {
        $request = new StoreApartmentRequest;

        return $request->rules();
    }

    public function mount()
    {
        $this->apartment = new Apartment;
        $this->apartment->active = true;
    }

    public function render()
    {
        return view('apartment::livewire.admin.create');
    }

    public function store()
    {
        $this->validate();

        $exists = Apartment::where('name', $this->apartment->name)->first();
        if ($exists) {
            session()->flash('status', 'Apartment already exists.');

            return;
        }

        $this->apartment->save();

        if ($this->rooms) {
            for ($i = 0; $i < $this->rooms; $i++) {
                $this->apartment->rooms()->create(['name' => 'Room '.($i + 1)]);
            }
        }

        session()->flash('status', 'Apartment created successfully.');
        $this->reset();
        $this->emitUp('refresh');
    }
}
