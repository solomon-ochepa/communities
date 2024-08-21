<?php

namespace Modules\Apartment\app\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Apartment\app\Models\Apartment;

class Index extends Component
{
    use WithPagination;

    public $search = '';

    public $limit = 25;

    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        $data = [];
        if ($this->search) {
            $data['apartments'] = Apartment::where('name', 'like', '%'.$this->search.'%')->paginate($this->limit);
        } else {
            $data['apartments'] = Apartment::paginate($this->limit);
        }

        return view('apartment::livewire.admin.index', $data);
    }
}
