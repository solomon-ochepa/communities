<?php

namespace Modules\Apartment\app\Http\Livewire\Admin\Room;

use Livewire\Component;
use Modules\Apartment\app\Http\Requests\UpdateApartmentRoomRequest;
use Modules\Room\app\Models\Room;

class Edit extends Component
{
    /** @var Room $room room to be created */
    public $room;

    protected $listeners = ['refresh' => '$refresh'];

    /**
     * Validation rules
     **/
    protected function rules()
    {
        $request = new UpdateApartmentRoomRequest($this->room->toArray());
        return $request->rules();
    }

    public function render()
    {
        return view('apartment::livewire.admin.room.edit');
    }

    public function update()
    {
        $this->validate();

        // Apartment has room
        // if ($this->apartment->rooms()->where(['name' => $this->room->name])->count()) {
        //     session()->flash('status', "Room already exists.");
        //     return;
        // }

        // Store
        $this->room->update();

        session()->flash('status', "Room ({$this->room->name}) updated successfully.");
        $this->emitUp('refresh');
    }
}
