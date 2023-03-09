<?php

namespace App\Http\Livewire\Office\Apartment\Room\Resident;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class Inde extends Component
{
    use WithPagination;

    public $apartment;
    public $selected = [];
    public $select_all = false;

    public $limit = 10;
    public $search = "";
    public $page = 1;
    protected $queryString = [
        // 'foo',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        if ($this->search) {
            $residents = $this->apartment->residents->where('user.first_name', 'like', '%' . $this->search . '%'); ///*->orderBy('name')*/->paginate($this->limit);
            // dd($residents);
        } else {
            $residents = $this->apartment->residents;
        }

        return view('livewire.office.apartment.room.resident.inde', [
            'residents' => $residents,
        ]);
    }
}
