<?php

namespace Modules\Occupant\app\Http\Livewire\Admin\Modals;

use App\Models\User;
use Livewire\Component;
use Modules\Apartment\app\Models\Apartment;
use Modules\Occupant\App\Http\Requests\StoreOccupantRequest;
use Modules\Occupant\App\Models\Occupant;
use Modules\Room\App\Models\Room;

class Create extends Component
{
    // /** @var User $user Seleted user to be added as occupant */
    // public $user;

    /** @var Occupant The occupant to be created */
    public $occupant;

    /** @var Room The room that occupant will be assigned. Can be null if the occupant is occupying the whole apartment. */
    public $room;

    /** @var Apartment The apartment that occupant will be assigned */
    public $apartment;

    /** @var array meta data */
    public array $data = [];

    /** @var array meta data */
    public array $form = [];

    /** @var array List of existing occupants. */
    public array $occupants = [];

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        $this->reset_occupant();
    }

    public function render()
    {
        $this->data['users'] = User::/*whereNotIn('id', $this->occupants)->*/ get();

        return view('occupant::livewire.admin.modals.create', $this->data);
    }

    protected function reset_occupant()
    {
        $this->occupant = new Occupant;

        $this->occupant->active = true;
        $this->occupant->status_code = 1;

        if ($this->room) {
            $this->occupant->apartment_id = $this->room->roomable->id; // required
            $this->occupant->room_id = $this->room->id; // nullable

            $this->occupants = $this->room->occupants->pluck('user_id')->toArray(); // update on 'room_id' changed!
        } elseif ($this->apartment) {
            $this->occupant->apartment_id = $this->apartment->id; // required

            $this->occupants = $this->apartment->occupants->pluck('user_id')->toArray(); // update on 'room_id' changed!
        }

        if (! $this->apartment) {
            $apartments_with_single_occupant = Occupant::whereDoesntHave('room')->pluck('apartment_id')->toArray();

            $this->data['apartments'] = Apartment::whereNotIn('id', $apartments_with_single_occupant)->pluck('name', 'id')->toArray();
        }
    }

    public function updatedOccupantApartmentID($id, $key = null)
    {
        $this->apartment = Apartment::find($id);

        $this->data['rooms'] = $this->apartment ? $this->apartment->rooms->WhereNotIn('id', $this->data['user']['rooms'] ?? [])->pluck('name', 'id')->toArray() : [];
    }

    public function updatedOccupantRoomID($id, $key = null)
    {
        $this->room = Room::find($id);
        // $this->occupants = $this->apartment->occupants->pluck('user_id')->toArray(); // update on 'room_id' changed!
    }

    public function updatedOccupantUserID($id, $key = null)
    {
        if (isset($this->data['apartments'])) {
            $this->reset(['apartment']);
        }

        $this->reset(['room']);

        if ($id) {
            $this->data['user']['rooms'] = Occupant::whereUserId($id)->pluck('room_id')->toArray();
        }

        $this->data['rooms'] = $this->apartment ? $this->apartment->rooms->WhereNotIn('id', $this->data['user']['rooms'] ?? [])->pluck('name', 'id')->toArray() : [];
    }

    public function rules()
    {
        $request = new StoreOccupantRequest;

        return $request->rules();
    }

    public function submit()
    {
        $this->validate();

        $exists = Occupant::where($this->occupant->only('user_id', 'apartment_id', 'room_id'))->first();
        if ($exists) {
            session()->flash('error', 'This occupant already exists.');

            return;
        }

        $this->occupant->moved_in = $this->form['moved_in'];

        // dd($this->occupant);
        // Occupant
        $this->occupant->save();

        if ($this->room) {
            $this->room->refresh();
        } elseif ($this->apartment) {
            $this->apartment->refresh();
        }

        $this->emit('refresh');
        $this->reset_occupant();

        session()->flash('status', 'Occupant added successfully.');
    }
}
