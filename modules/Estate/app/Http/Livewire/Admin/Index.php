<?php

namespace Modules\Estate\app\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Estate\app\Models\Estate;

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
        if ($this->search) {
            $data['estates'] = Estate::where('name', 'like', '%'.$this->search.'%')->paginate($this->limit);
        } else {
            $data['estates'] = Estate::paginate($this->limit);
        }

        return view('estate::livewire.admin.index', $data);
    }
}
