<?php

namespace Modules\Occupant\app\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\Apartment\app\Models\Apartment;
use Modules\Occupant\App\Models\Occupant;
use Modules\Room\app\Models\Room;

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
            $data['tenants'] = Occupant::whereHas(User::class, function ($user) {
                $cols = ['users.first_name', 'users.last_name', 'users.username', 'users.phone', 'users.email'];

                foreach ($cols as $key => $col) {
                    if ($key == 0)
                        $user->where($col, 'like', '%' . $this->search . '%');
                    else
                        $user->orWhere($col, 'like', '%' . $this->search . '%');
                }

                return $user;
            })->orWhereHas(Apartment::class, function ($apartment) {
                $cols = ['apartments.name', 'apartments.slug'];

                foreach ($cols as $key => $col) {
                    if ($key == 0)
                        $apartment->where($col, 'like', '%' . $this->search . '%');
                    else
                        $apartment->orWhere($col, 'like', '%' . $this->search . '%');
                }

                return $apartment;
            })
                ->orWhereHas(Room::class, function ($room) {
                    $cols = ['rooms.name', 'rooms.slug'];

                    foreach ($cols as $key => $col) {
                        if ($key == 0)
                            $room->where($col, 'like', '%' . $this->search . '%');
                        else
                            $room->orWhere($col, 'like', '%' . $this->search . '%');
                    }

                    return $room;
                })
                ->whereActive(1)
                ->paginate($this->limit);
        } else {
            $data['tenants'] = Occupant::whereActive(1)->paginate($this->limit);
        }

        return view('occupant::livewire.admin.index', $data);
    }
}
