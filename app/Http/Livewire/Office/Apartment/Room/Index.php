<?php

namespace App\Http\Livewire\Office\Apartment\Room;

use App\Models\Room;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
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
            $rooms = $this->apartment->rooms()->where('name', 'like', '%' . $this->search . '%')->orderBy('name')->paginate($this->limit);
        } else {
            $rooms = $this->apartment->rooms()->orderBy('name')->paginate($this->limit);
        }

        return view('livewire.office.apartment.room.index', [
            'rooms' => $rooms,
        ]);
    }
}
