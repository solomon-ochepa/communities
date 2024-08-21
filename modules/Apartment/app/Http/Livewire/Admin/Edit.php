<?php

namespace Modules\Apartment\app\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Apartment\app\Http\Requests\UpdateApartmentRequest;

class Edit extends Component
{
    public $apartment;

    protected $listeners = ['refresh' => '$refresh'];

    protected function rules()
    {
        $request = new UpdateApartmentRequest($this->apartment->toArray());

        return $request->rules();
    }

    public function render()
    {
        return view('apartment::livewire.admin.edit');
    }

    public function update()
    {
        $this->validate();

        $this->apartment->update();

        session()->flash('status', 'Apartment updated successfully.');
        $this->emitUp('refresh');
    }
}
