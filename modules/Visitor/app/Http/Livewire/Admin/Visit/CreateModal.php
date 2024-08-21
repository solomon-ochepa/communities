<?php

namespace Modules\Visitor\app\Http\Livewire\Admin\Visit;

use Livewire\Component;
use Illuminate\Support\Str;
use Modules\Gatepass\app\Models\GatepassRequest;
use Modules\Tenant\app\Models\Tenant;
use Modules\User\app\Models\User;
use Modules\Visitor\app\Http\Requests\StoreVisitRequest;
use Modules\Visitor\app\Models\Visit;
use Modules\Visitor\app\Models\Visitor;

class CreateModal extends Component
{
    /** @var Visit $visit */
    public Visit $visit;

    /** @var array $data meta data */
    public array $data = [];

    /** @var array $form meta data */
    public array $form = [];

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        $this->init();
    }

    public function init()
    {
        $this->visit = new Visit();

        $this->data = [];
        $this->form = [];

        /** get list of eligeble users */
        $this->data['users'] = User::get()->toArray();
        $this->data['tenants'] = [];

        $this->form['gatepass'] = true;
    }

    public function render()
    {
        return view('visitor::livewire.admin.visit.create-modal', $this->data);
    }

    public function rules()
    {
        $request = new StoreVisitRequest();
        return $request->rules();
    }

    public function updatedFormUserID($id, $key = null)
    {
        return $this->data['tenants'] = Tenant::with('user', 'room', 'apartment')->whereNotIn('user_id', [$id])->get()->toArray();
    }

    public function submit()
    {
        $this->validate();

        // Who's making the request?
        $this->visit['requested_by'] = auth()->user()->id;

        // Get 'visitor_id' via the provided User ID
        $visitor = Visitor::firstOrCreate(['user_id' => $this->form['user_id']], []);
        $this->visit['visitor_id'] = $visitor->id;

        // Who/what are you visiting? (Visitable)
        $this->visit['visitable_type'] = Tenant::class; // dynamic
        $this->visit['visitable_id'] = $this->form['tenant_id'];

        // Check for existing/duplicate record
        $exists = Visit::where($this->visit->only(['visitor_id', 'visitable_type', 'visitable_id', 'arrived_at']))->count();
        if ($exists) {
            session()->flash('error', 'This Visit Request already exists.');
            return;
        }

        $this->visit->save();

        // Gatepass
        $gatepass = Visitor::find($this->visit['visitor_id'])->user->gatepass;

        // Gatepass Request
        if (isset($this->form['gatepass'])) {
            GatepassRequest::firstOrCreate([
                'gatepass_id'       => $gatepass->id,
                'requestable_type'  => get_class($this->visit),
                'requestable_id'    => $this->visit->id,
            ], [
                'code'              => Str::random(6),
            ]);
        }

        $this->emit('refresh');
        $this->init();

        session()->flash('status', 'Visit request created successfully.');
    }
}
