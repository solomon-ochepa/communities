<?php

namespace App\Http\Livewire\Office\Apartment\Room\Resident;

use App\Models\Resident;
use App\Models\Room;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;

class Create extends Component
{
    public $apartment;
    public $key;
    public $apartments;
    public $checked = [];
    public $resident;
    public $edit = true;

    public $limit = 6;
    public $search;
    public $page = 1;
    protected $queryString = [
        // 'foo',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    protected $listeners = ['refresh' => '$refresh'];

    protected $rules = [
        'apartments.*.residents.*.moved_in' => ['nullable', 'date'],
        'apartments.*.residents.*.room_id' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->key = "apartments.{$this->apartment->id}.residents";

        if (!$this->resident) {
            $this->resident = new Resident();
            $this->edit = false;
        }
    }

    public function updated($key, $value = null)
    {
        $exepts = ['search'];

        if (!in_array($key, $exepts)) {
            session()->put($key, $value);
        }
    }

    public function render()
    {
        $this->checked = collect(session($this->key));

        // session()->remove('apartments');
        // dd(session()->all());

        // dd(Carbon::instance("2022-11-06"));

        if (strlen($this->search) > 2) {
            $users = User::where('first_name', 'like', '%' . $this->search . '%')
                ->orWhere('last_name', 'like', '%' . $this->search . '%')
                ->orWhere('username', 'like', '%' . $this->search . '%')
                ->orWhere('email', 'like', '%' . $this->search . '%')
                ->orWhere('phone', 'like', '%' . $this->search . '%')
                ->orderBy('first_name')->paginate($this->limit);
        } else {
            $users = collect();
        }

        return view('livewire.office.apartment.room.resident.create', [
            'users' => $users,
        ]);
    }

    public function check(User $user)
    {
        $key = "{$this->key}.{$user->id}";
        if (session($key)) {
            session()->remove($key);
        } else {
            session()->put($key, $user->toArray());
        }
    }

    public function submit()
    {
        $this->validate();

        if (!$this->apartment) {
            session()->flash('error', "Apartment properties not valid.");
            return;
        }

        foreach ($this->checked as $key => $user) {
            $exists = Resident::where([
                'user_id' => $user['id'],
                'room_id' => $this->apartment->id,
            ])->first();

            dd($user);
            if ($exists) {
                session()->remove("{$this->key}.{$user['id']}");
                session()->flash('error', "Resident already allocated.");
                return;
            }

            $resident = new Resident();
            $resident->user_id = $user['id'];

            // Store
            $this->room->residents()->save($resident);
        }

        if ($this->edit) {
            session()->flash('status', "Resident updated successfully.");
        } else {
            session()->flash('status', "Resident created successfully.");
            // $this->reset();
        }

        session()->remove($this->key);

        $this->emit('refresh');
    }
}
