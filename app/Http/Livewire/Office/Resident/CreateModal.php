<?php

namespace App\Http\Livewire\Office\Resident;

use App\Http\Requests\StoreResidentRequest;
use App\Models\Apartment;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CreateModal extends Component
{
    use WithPagination;

    public $data = [];
    public $resident = [];
    public $apartment_id;
    public $apartment;

    public function rules()
    {
        $request = new StoreResidentRequest();
        return $request->rules();
    }

    public function render()
    {
        $this->data['users'] = User::paginate(6);
        $this->data['apartments'] = Apartment::paginate(6);

        return view('livewire.office.resident.create-modal', $this->data);
    }

    public function updatedResidentApartmentId($value)
    {
        $this->apartment = Apartment::find($value);
    }

    public function store()
    {
        $this->validate();

        $resident = $this->apartment->residents()->firstOrCreate([
            'user_id'   => $this->resident['user_id'],
            'room_id'   => $this->resident['room_id'],
            // 'residents.apartment_id'    => $this->resident['apartment_id'],
        ]);

        session()->flash('status', 'Resiednt added successfully.');
        $this->emit('refresh');
    }
}
