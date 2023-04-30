<?php

namespace Modules\Visitor\app\Http\Livewire\Visit\Admin;

use Livewire\Component;
use Modules\Visitor\app\Models\Visit;

class Index extends Component
{
    public $data = [];
    public $visitor;

    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        // dd($this->visitor);

        $this->data['visits']           = Visit::with(['visitor', 'visitor.user', 'status', 'visitable', 'visitable.user', 'visitable.status', 'visitable.apartment', 'visitable.room'])
            ->whereVisitorId($this->visitor->id)
            ->get();

        $this->data['total_visits']     = $this->data['visits']->count();
        $this->data['active_visits']    = $this->data['visits']->where('active', 1)->count();
        $this->data['inactive_visits']  = $this->data['visits']->where('active', 0)->count();
        $this->data['active_visits_percentage'] = $this->data['total_visits'] > 0 ? (100 / $this->data['total_visits']) * $this->data['active_visits'] : 0;

        return view('visitor::livewire.visit.admin.index', $this->data);
    }
}
