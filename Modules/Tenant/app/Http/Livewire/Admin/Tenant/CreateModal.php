<?php

namespace Modules\Tenant\app\Http\Livewire\Admin\Tenant;

use Illuminate\Support\Arr;
use Livewire\Component;
use Modules\Apartment\app\Models\Apartment;
use Modules\Room\app\Models\Room;
use Modules\Tenant\app\Http\Requests\StoreTenantRequest;
use Modules\Tenant\app\Models\Tenant;
use Modules\User\app\Models\User;

class CreateModal extends Component
{
    public Room $room;
    public Apartment $apartment;
    public Tenant $tenant;

    public array $data;
    public array $tenants;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        $this->tenant = new Tenant();

        $this->tenant->active = true;

        if ($this->room) {
            $this->tenant->room_id = $this->room->id; // nullable
            $this->tenant->apartment_id = $this->room->roomable->id; // required

            $this->tenants = $this->room->tenants->pluck('user_id')->toArray();
        } elseif ($this->apartment) {
            $this->tenant->apartment_id = $this->apartment->id; // required
            $this->tenants = $this->apartment->tenants->pluck('user_id')->toArray();
        }
    }

    public function render()
    {
        $this->data['users'] = User::whereNotIn('id', $this->tenants)->get();

        return view('tenant::livewire.admin.tenant.create-modal', $this->data);
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

        session()->flash('status', 'Tenant added successfully.');
        $this->emit('refresh');
    }
}
