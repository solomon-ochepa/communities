<?php

namespace Modules\Vehicle\app\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Vehicle\app\Models\Vehicle;

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
            $data['vehicles'] = Vehicle::with(['trim'])
                ->where('vin', 'like', '%'.$this->search.'%')
                ->orWhere('vrn', 'like', '%'.$this->search.'%')
                ->paginate($this->limit);
        } else {
            $data['vehicles'] = Vehicle::paginate($this->limit);
        }

        return view('vehicle::livewire.admin.index', $data);
    }
}
