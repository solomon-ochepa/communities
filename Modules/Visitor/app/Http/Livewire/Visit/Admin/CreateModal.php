<?php

namespace Modules\Visitor\app\Http\Livewire\Visit\Admin;

use Livewire\Component;
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
    }

    public function render()
    {
        return view('visitor::livewire.visit.admin.create-modal', $this->data);
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

        // Get 'Visitor ID' via the provided User ID
        $this->visit['visitor_id'] = Visitor::firstOrCreate(['user_id' => $this->form['user_id']], [])->value('id');

        // Validate visitor_id
        $this->validate(['visit.visitor_id' => ['required', 'uuid']]);

        // Who/what are you visiting? (Visitable)
        $this->visit['visitable_type'] = Tenant::class;
        $this->visit['visitable_id'] = $this->form['tenant_id'];

        // Check for existing/duplicate record
        $exists = Visit::where($this->visit->only(['visitor_id', 'visitable_type', 'visitable_id', 'arrived_at']))->count();
        if ($exists) {
            session()->flash('error', 'This Visit Request already exists.');
            return;
        }

        $this->visit->save();

        $this->emit('refresh');
        $this->init();

        session()->flash('status', 'Visit request created successfully.');
    }
}
