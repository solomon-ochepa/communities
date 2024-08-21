<?php

namespace Modules\Community\app\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Community\app\Models\Community;

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
            $data['communities'] = Community::where('name', 'like', '%' . $this->search . '%')->paginate($this->limit);
        } else {
            $data['communities'] = Community::paginate($this->limit);
        }

        return view('community::livewire.admin.index', $data);
    }
}
