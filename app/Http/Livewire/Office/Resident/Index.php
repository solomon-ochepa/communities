<?php

namespace App\Http\Livewire\Office\Resident;

use App\Models\Resident;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $selected = [];
    public $select_all = false;

    public $search = "";
    public $limit = 100;
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        if (strlen($this->search) > 2) {
            $residents = Resident::with('user')->where('user.first_name', 'like', '%' . $this->search . '%'); ///*->orderBy('name')*/->paginate($this->limit);
            // dd($residents);
        } else {
            $residents = Resident::latest()->paginate($this->limit);
        }

        return view('livewire.office.resident.index', [
            'residents' => $residents,
        ]);
    }
}
