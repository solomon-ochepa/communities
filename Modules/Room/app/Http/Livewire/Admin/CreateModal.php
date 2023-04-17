<?php

namespace Modules\Room\app\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Apartment\app\Models\Apartment;
use Modules\Room\app\Http\Requests\StoreRoomRequest;
use Modules\Room\app\Models\Room;

class CreateModal extends Component
{
    public $room;
    public $apartment;

    public array $data = [];

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        $this->reset_room();
    }

    protected function reset_room()
    {
        $this->room = new Room();
        $this->room->active = 1;
        $this->room->roomable_type = Apartment::class;

        if ($this->apartment) {
            $this->room->roomable_id = $this->apartment->id;
        }
    }

    public function render()
    {
        if (!$this->apartment) {
            $this->data['apartments'] = Apartment::all();
        }

        return view('room::livewire.admin.create-modal', $this->data);
    }

    public function rules()
    {
        $request = new StoreRoomRequest();
        return $request->rules();
    }

    public function submit()
    {
        $this->validate();

        $exists = Room::where($this->room->only('name', 'roomable_type', 'roomable_id'))->first();
        if ($exists) {
            session()->flash('error', "<strong>\"{$this->room->name}\"</strong> already exists.");
            return;
        }

        // Room
        $this->room->save();
        if ($this->apartment) {
            $this->apartment->refresh();
        }

        session()->flash('status', 'Room added successfully.');
        $this->emit('refresh');
        $this->reset_room();
    }
}
