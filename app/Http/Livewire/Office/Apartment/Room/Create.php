<?php

namespace App\Http\Livewire\Office\Apartment\Room;

use App\Models\Room;
use Livewire\Component;

class Create extends Component
{
    public $apartment;
    public $room;
    public $edit = true;

    protected $listeners = ['refresh' => '$refresh'];

    protected $rules = [
        'room.name' => ['required', 'string', 'max:32'],
        // 'room.parent_id' => ['nullable', 'string'],
        // 'room.icon' => ['nullable', 'string'],
        // 'room.url' => ['required', 'string'],
        // 'room.tag' => ['nullable', 'string'],
        // 'room.priority' => ['nullable', 'integer'],
        'room.active' => ['nullable', 'boolean'],
    ];

    public function mount()
    {
        if (!$this->room) {
            $this->room = new Room();
            $this->edit = false;
        }
    }

    public function render()
    {
        return view('livewire.office.apartment.room.create');
    }

    public function submit()
    {
        $this->validate();

        if (!$this->apartment) {
            session()->flash('error', "Apartment properties not valid.");
            return;
        }

        $exists = Room::where([
            'name' => $this->room->name,
            'apartment_id' => $this->apartment->id,
        ])->first();

        if ($exists) {
            session()->flash('error', "Room ({$this->room->name}) already exists.");
            return;
        }

        // Store
        $this->apartment->rooms()->save($this->room);

        if ($this->edit) {
            session()->flash('status', "Room ({$this->room->name}) updated successfully.");
        } else {
            session()->flash('status', "Room ({$this->room->name}) created successfully.");
            // $this->reset();
        }

        $this->emit('refresh');
    }
}
