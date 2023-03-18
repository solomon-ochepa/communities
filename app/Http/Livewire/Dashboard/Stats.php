<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Apartment;
use App\Models\Resident;
use App\Models\Room;
use App\Models\Visit;
use Livewire\Component;

class Stats extends Component
{
    public $data = [];

    public function render()
    {
        $this->data['apartments']           = Apartment::all();
        $this->data['total_apartments']     = $this->data['apartments']->count();
        $this->data['active_apartments']    = $this->data['apartments']->where('active', 1)->count();
        $this->data['inactive_apartments']  = $this->data['apartments']->where('active', 0)->count();
        $this->data['active_apartments_percentage'] = $this->data['total_apartments'] > 0 ? (100 / $this->data['total_apartments']) * $this->data['active_apartments'] : 0;

        $this->data['rooms']           = Room::all();
        $this->data['total_rooms']     = $this->data['rooms']->count();
        $this->data['active_rooms']    = $this->data['rooms']->where('active', 1)->count();
        $this->data['inactive_rooms']  = $this->data['rooms']->where('active', 0)->count();
        $this->data['active_rooms_percentage'] = $this->data['total_rooms'] > 0 ? (100 / $this->data['total_rooms']) * $this->data['active_rooms'] : 0;

        $this->data['residents']           = Resident::all();
        $this->data['total_residents']     = $this->data['residents']->count();
        $this->data['active_residents']    = $this->data['residents']->where('active', 1)->count();
        $this->data['inactive_residents']  = $this->data['residents']->where('active', 0)->count();

        return view('livewire.dashboard.stats', $this->data);
    }
}
