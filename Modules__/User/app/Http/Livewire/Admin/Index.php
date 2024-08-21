<?php

namespace Modules\User\app\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\User\app\Models\User;

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
            $data['users'] = User::withTrashed()->where(function ($user) {
                $cols = ['users.first_name', 'users.last_name', 'users.username', 'users.phone', 'users.email'];

                foreach ($cols as $key => $col) {
                    if ($key == 0)
                        $user->where($col, 'like', '%' . $this->search . '%');
                    else
                        $user->orWhere($col, 'like', '%' . $this->search . '%');
                }

                return $user;
            })->paginate($this->limit);
        } else {
            $data['users'] = User::withTrashed()->paginate($this->limit);
        }

        return view('user::livewire.admin.index', $data);
    }
}
