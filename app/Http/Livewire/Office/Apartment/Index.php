<?php

namespace App\Http\Livewire\Office\Apartment;

use App\Models\Apartment;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $selected = [];

    public $limit = 30;
    public $search = "";
    public $page = 1;

    protected $queryString = [
        'search'    => ['except' => ''],
        'page'      => ['except' => 1],
    ];

    public function render()
    {
        $data = [];
        if ($this->search) {
            $data['apartments'] = Apartment::where('name', 'like', '%' . $this->search . '%')->paginate($this->limit);
        } else {
            $data['apartments'] = Apartment::paginate($this->limit);
        }

        return view('livewire.office.apartment.index', $data);
    }
}
