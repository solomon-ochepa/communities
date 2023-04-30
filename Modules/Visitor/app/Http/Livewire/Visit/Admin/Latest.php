<?php

namespace Modules\Visitor\app\Http\Livewire\Visit\Admin;

use Livewire\Component;
use Modules\Visitor\app\Models\Visit;

class Latest extends Component
{
    public $data = [];

    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        $this->data['visits']           = Visit::all();
        $this->data['total_visits']     = $this->data['visits']->count();
        $this->data['active_visits']    = $this->data['visits']->where('active', 1)->count();
        $this->data['inactive_visits']  = $this->data['visits']->where('active', 0)->count();
        $this->data['active_visits_percentage'] = $this->data['total_visits'] > 0 ? (100 / $this->data['total_visits']) * $this->data['active_visits'] : 0;

        return view('visitor::livewire.visit.admin.latest', $this->data);
    }
}
