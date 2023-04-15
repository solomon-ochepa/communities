<?php

namespace Modules\Tenant\app\Http\Livewire\Admin\Tenant;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Apartment\app\Models\Apartment;
use Modules\Room\app\Models\Room;
use Modules\Tenant\app\Models\Tenant;
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

    public function render()
    {
        $data = [];
        if ($this->search) {
            $data['tenants'] = Tenant::whereHas(\User::class, function ($user) {
                $cols = ['users.first_name', 'users.last_name', 'users.username', 'users.phone', 'users.email'];

                foreach ($cols as $key => $col) {
                    if ($key == 0)
                        $user->where($col, 'like', '%' . $this->search . '%');
                    else
                        $user->orWhere($col, 'like', '%' . $this->search . '%');
                }

                return $user;
            })->orWhereHas(\Apartment::class, function ($apartment) {
                $cols = ['apartments.name', 'apartments.slug'];

                foreach ($cols as $key => $col) {
                    if ($key == 0)
                        $apartment->where($col, 'like', '%' . $this->search . '%');
                    else
                        $apartment->orWhere($col, 'like', '%' . $this->search . '%');
                }

                return $apartment;
            })
                ->orWhereHas(\Room::class, function ($room) {
                    $cols = ['rooms.name', 'rooms.slug'];

                    foreach ($cols as $key => $col) {
                        if ($key == 0)
                            $room->where($col, 'like', '%' . $this->search . '%');
                        else
                            $room->orWhere($col, 'like', '%' . $this->search . '%');
                    }

                    return $room;
                })
                ->paginate($this->limit);
        } else {
            $data['tenants'] = Tenant::paginate($this->limit);
        }

        return view('tenant::livewire.admin.tenant.index', $data);
    }
}
