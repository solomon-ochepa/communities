<?php

namespace Modules\Apartment\app\Http\Livewire\Admin\Room;

use Livewire\Component;
use Modules\Apartment\app\Http\Requests\StoreApartmentRoomRequest;
use Modules\Room\app\Models\Room;

class Create extends Component
{
    /** @var Apartment $apartment room's apartment */
    public $apartment;

    /** @var Room $room room to be created */
    public $room;

    protected $listeners = ['refresh' => '$refresh'];

    /**
     * Validation rules
     **/
    protected function rules()
    {
        $request = new StoreApartmentRoomRequest();
        return $request->rules();
    }

    public function mount()
    {
        $this->room = new Room();
    }

    public function render()
    {
        return view('apartment::livewire.admin.room.create');
    }

    public function store()
    {
        $this->validate();

        if (!$this->apartment) {
            session()->flash('error', "Apartment not valid.");
            return;
        }

        // Apartment has room
        if ($this->apartment->rooms()->where(['name' => $this->room->name])->count()) {
            session()->flash('status', "Room already exists.");
            return;
        }

        // Store
        $this->apartment->rooms()->save($this->room);

        session()->flash('status', "Room ({$this->room->name}) created successfully.");
        $this->reset();
        $this->emitUp('refresh');
    }
}
