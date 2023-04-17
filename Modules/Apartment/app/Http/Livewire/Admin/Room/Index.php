<?php

namespace Modules\Apartment\app\Http\Livewire\Admin\Room;

use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $apartment;

    public $data = [];

    public $search = "";
    public $limit = 25;
    public $page = 1;
    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        if ($this->search) {
            $this->data['rooms'] = $this->apartment->rooms()
                ->where('name', 'like', '%' . $this->search . '%')
                ->orderBy('name')
                ->paginate($this->limit);
        } else {
            $this->data['rooms'] = $this->apartment->rooms()
                ->orderBy('name')
                ->paginate($this->limit);
        }

        return view('apartment::livewire.admin.room.index', $this->data);
    }
}
