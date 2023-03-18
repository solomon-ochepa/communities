<?php

namespace App\Http\Livewire\Office\Menu;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $selected = [];

    public $limit = 25;
    public $search = "";
    public $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function render()
    {
        if ($this->search) {
            $menus = Menu::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('url', 'like', '%' . $this->search . '%')
                ->orWhere('icon', 'like', '%' . $this->search . '%')
                ->orWhere('tag', 'like', '%' . $this->search . '%')
                ->paginate($this->limit);
        } else {
            $menus = Menu::paginate($this->limit);
        }

        return view('livewire.office.menu.index', compact('menus'));
    }
}
