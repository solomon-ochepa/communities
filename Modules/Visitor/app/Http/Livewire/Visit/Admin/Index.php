<?php

namespace Modules\Visitor\app\Http\Livewire\Visit\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\User\app\Models\User;
use Modules\Visitor\app\Models\Visitor;

class Index extends Component
{
    use WithPagination;

    public $search = "";
    public $limit = 25;
    public $page = 1;

    protected $queryString = [
        'search'    => ['except' => ''],
        'page'      => ['except' => 1],
    ];

    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        $data = [];
        if ($this->search) {
            $data['visitors'] = Visitor::whereHas(\User::class, function ($user) {
                $cols = ['users.first_name', 'users.last_name', 'users.username', 'users.phone', 'users.email'];

                foreach ($cols as $key => $col) {
                    if ($key == 0)
                        $user->where($col, 'like', '%' . $this->search . '%');
                    else
                        $user->orWhere($col, 'like', '%' . $this->search . '%');
                }

                return $user;
            })
                ->whereActive(1)
                ->paginate($this->limit);
        } else {
            $data['visitors'] = Visitor::with('visits')->whereActive(1)->paginate($this->limit);
        }

        return view('visitor::livewire.visit.admin.index', $data);
    }
}
