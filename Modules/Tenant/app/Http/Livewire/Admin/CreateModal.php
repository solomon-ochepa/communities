<?php

namespace Modules\Tenant\app\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Tenant\app\Http\Requests\StoreTenantRequest;
use Modules\Tenant\app\Models\Tenant;
use Modules\User\app\Models\User;

class CreateModal extends Component
{
    /** @var Tenant $tenant The tenant to be created */
    public $tenant;

    /** @var Room $room The room that tenant will be assigned. Can be null if the tenant is occupying the whole apartment. */
    public $room;

    /** @var Apartment $apartment The apartment that tenant will be assigned */
    public $apartment;

    /** @var array $data meta data */
    public array $data = [];

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
        if ($this->room) {
            $this->tenant->apartment_id = $this->room->roomable->id; // required
            $this->tenant->room_id = $this->room->id; // nullable

            $this->tenants = $this->room->tenants->pluck('user_id')->toArray(); // update on 'room_id' changed!
        } elseif ($this->apartment) {
            $this->tenant->apartment_id = $this->apartment->id; // required

            $this->tenants = $this->apartment->tenants->pluck('user_id')->toArray(); // update on 'room_id' changed!
        }
    }

    public function render()
    {
        /** @var Collection $users get list of users that can be added as new tenants */
        $this->data['users'] = User::whereNotIn('id', $this->tenants)->get();

        return view('tenant::livewire.admin.create-modal', $this->data);
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

        // Status code
        if ($this->tenant->status_code === null)
            $this->tenant->status_code = 1;

        // Tenant
        $this->tenant->save();

        if ($this->room) {
            $this->room->refresh();
        } elseif ($this->apartment) {
            $this->apartment->refresh();
        }

        $this->emit('refresh');

        session()->flash('status', 'Tenant added successfully.');
        $this->reset_tenant();
    }
}
