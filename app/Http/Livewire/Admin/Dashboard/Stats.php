<?php

namespace App\Http\Livewire\Admin\Dashboard;

use Livewire\Component;
use Modules\Apartment\app\Models\Apartment;
use Modules\Community\app\Models\Community;
use Modules\Occupant\App\Models\Occupant;
use Modules\Room\App\Models\Room;

class Stats extends Component
{
    public $data = [];

    public function render()
    {
        $this->data['communities'] = Community::all();
        $this->data['total_communities'] = $this->data['communities']->count();
        $this->data['active_communities'] = $this->data['communities']->where('active', 1)->count();
        $this->data['inactive_communities'] = $this->data['communities']->where('active', 0)->count();
        $this->data['active_communities_percentage'] = $this->data['total_communities'] > 0 ? (100 / $this->data['total_communities']) * $this->data['active_communities'] : 0;

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
