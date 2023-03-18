<?php

namespace App\Http\Livewire\Office\Visit;

use App\Models\Visit;
use Livewire\Component;

class Recent extends Component
{
    public $data = [];

    public function render()
    {
        $this->data['visits']           = Visit::all();
        $this->data['total_visits']     = $this->data['visits']->count();
        $this->data['active_visits']    = $this->data['visits']->where('active', 1)->count();
        $this->data['inactive_visits']  = $this->data['visits']->where('active', 0)->count();
        $this->data['active_visits_percentage'] = $this->data['total_visits'] > 0 ? (100 / $this->data['total_visits']) * $this->data['active_visits'] : 0;

        return view('livewire.office.visit.recent', $this->data);
    }
}
