<?php

namespace Modules\Gatepass\app\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Gatepass\app\Models\Gatepass;

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

    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        $data = [];
        if ($this->search) {
            $data['gatepasses'] = Gatepass::with(['categories', 'status'])->where(function ($gatepass) {
                $cols = ['gatepasses.code'];

                foreach ($cols as $key => $col) {
                    if ($key == 0) {
                        $gatepass->where($col, 'like', '%'.$this->search.'%');
                    } else {
                        $gatepass->orWhere($col, 'like', '%'.$this->search.'%');
                    }
                }

                return $gatepass;
            })->latest()->paginate($this->limit);
        } else {
            $data['gatepasses'] = Gatepass::with(['categories', 'status'])->latest()->paginate($this->limit);
        }

        return view('gatepass::livewire.admin.index', $data);
    }
}
