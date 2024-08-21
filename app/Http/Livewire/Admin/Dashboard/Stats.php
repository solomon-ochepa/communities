<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use Modules\Apartment\app\Models\Apartment;
use Modules\Estate\app\Models\Estate;
use Modules\Occupant\App\Models\Occupant;
use Modules\Room\App\Models\Room;

class Stats extends Component
{
    public $data = [];

    public function render()
    {
        $this->data['estates'] = Estate::all();
        $this->data['total_estates'] = $this->data['estates']->count();
        $this->data['active_estates'] = $this->data['estates']->where('active', 1)->count();
        $this->data['inactive_estates'] = $this->data['estates']->where('active', 0)->count();
        $this->data['active_estates_percentage'] = $this->data['total_estates'] > 0 ? (100 / $this->data['total_estates']) * $this->data['active_estates'] : 0;

        $this->data['apartments'] = Apartment::all();
        $this->data['total_apartments'] = $this->data['apartments']->count();
        $this->data['active_apartments'] = $this->data['apartments']->where('active', 1)->count();
        $this->data['inactive_apartments'] = $this->data['apartments']->where('active', 0)->count();
        $this->data['active_apartments_percentage'] = $this->data['total_apartments'] > 0 ? (100 / $this->data['total_apartments']) * $this->data['active_apartments'] : 0;

        $this->data['rooms'] = Room::all();
        $this->data['total_rooms'] = $this->data['rooms']->count();
        $this->data['active_rooms'] = $this->data['rooms']->where('active', 1)->count();
        $this->data['inactive_rooms'] = $this->data['rooms']->where('active', 0)->count();
        $this->data['active_rooms_percentage'] = $this->data['total_rooms'] > 0 ? (100 / $this->data['total_rooms']) * $this->data['active_rooms'] : 0;

        $this->data['occupants'] = Occupant::all();
        $this->data['total_occupants'] = $this->data['occupants']->count();
        $this->data['active_occupants'] = $this->data['occupants']->where('active', 1)->count();
        $this->data['inactive_occupants'] = $this->data['occupants']->where('active', 0)->count();

        return view('livewire.admin.dashboard.stats', $this->data);
    }
}
