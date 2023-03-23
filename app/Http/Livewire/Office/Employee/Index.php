<?php

namespace App\Http\Livewire\Office\Employee;

use App\Models\Apartment;
use App\Models\Employee;
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
            $data['employees'] = Employee::where('name', 'like', '%' . $this->search . '%')->paginate($this->limit);
        } else {
            $data['employees'] = Employee::paginate($this->limit);
        }

        return view('livewire.office.employee.index', $data);
    }
}
