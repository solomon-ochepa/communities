<?php

namespace Modules\Tenant\app\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Apartment\app\Models\Apartment;
use Modules\Room\app\Models\Room;
use Modules\Tenant\app\Http\Requests\StoreTenantRequest;
use Modules\Tenant\app\Models\Tenant;
use Modules\User\app\Models\User;

class CreateModal extends Component
{
    // /** @var User $user Seleted user to be added as tenant */
    // public $user;

    /** @var Tenant $tenant The tenant to be created */
    public $tenant;

    /** @var Room $room The room that tenant will be assigned. Can be null if the tenant is occupying the whole apartment. */
    public $room;

    /** @var Apartment $apartment The apartment that tenant will be assigned */
    public $apartment;

    /** @var array $data meta data */
    public array $data = [];

    /** @var array $form meta data */
    public array $form = [];

    /** @var array $tenants List of existing tenants. */
    public array $tenants = [];

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        $this->reset_tenant();
    }

    protected function reset_tenant()
    {
        $this->tenant = new Tenant();
        $this->tenant->active = true;
        $this->tenant->status_code = 1;
        if ($this->room) {
            $this->tenant->apartment_id = $this->room->roomable->id; // required
            $this->tenant->room_id = $this->room->id; // nullable

            $this->tenants = $this->room->tenants->pluck('user_id')->toArray(); // update on 'room_id' changed!
        } elseif ($this->apartment) {
            $this->tenant->apartment_id = $this->apartment->id; // required

            $this->tenants = $this->apartment->tenants->pluck('user_id')->toArray(); // update on 'room_id' changed!
        }

        if (!$this->apartment) {
            $apartments_with_single_tenant = Tenant::whereDoesntHave(\Room::class)->pluck('apartment_id')->toArray();

            $this->data['apartments'] = Apartment::whereNotIn('id', $apartments_with_single_tenant)->pluck('name', 'id')->toArray();
        }
    }

    public function render()
    {
        /** get list of users that are eligeble as new tenants */
        $this->data['users'] = User::/*whereNotIn('id', $this->tenants)->*/get();

        return view('tenant::livewire.admin.create-modal', $this->data);
    }

    public function updatedTenantApartmentID($id, $key = null)
    {
        $this->apartment = Apartment::find($id);

        $this->data['rooms'] = $this->apartment ? $this->apartment->rooms->WhereNotIn('id', $this->data['user']['rooms'] ?? [])->pluck('name', 'id')->toArray() : [];
    }

    public function updatedTenantRoomID($id, $key = null)
    {
        $this->room = Room::find($id);
        // $this->tenants = $this->apartment->tenants->pluck('user_id')->toArray(); // update on 'room_id' changed!
    }

    public function updatedTenantUserID($id, $key = null)
    {
        if (isset($this->data['apartments'])) {
            $this->reset(['apartment']);
        }

        $this->reset(['room']);

        if ($id) {
            $this->data['user']['rooms'] = Tenant::whereUserId($id)->pluck('room_id')->toArray();
        }

        $this->data['rooms'] = $this->apartment ? $this->apartment->rooms->WhereNotIn('id', $this->data['user']['rooms'] ?? [])->pluck('name', 'id')->toArray() : [];
    }

    public function rules()
    {
        $request = new StoreTenantRequest();
        return $request->rules();
    }

    public function submit()
    {
        $this->validate();

        $exists = Tenant::where($this->tenant->only('user_id', 'apartment_id', 'room_id'))->first();
        if ($exists) {
            session()->flash('error', 'This tenant already exists.');
            return;
        }

        $this->tenant->moved_in = $this->form['moved_in'];

        // dd($this->tenant);
        // Tenant
        $this->tenant->save();

        if ($this->room) {
            $this->room->refresh();
        } elseif ($this->apartment) {
            $this->apartment->refresh();
        }

        $this->emit('refresh');
        $this->reset_tenant();

        session()->flash('status', 'Tenant added successfully.');
    }
}
