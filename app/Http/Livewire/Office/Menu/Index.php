<?php

namespace App\Http\Livewire\Office\Menu;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $selected = [];

    public $limit = 10;
    public $search = "";
    public $page = 1;
    // protected $queryString = [
    //     // 'foo',
    //     'search' => ['except' => ''],
    //     'page' => ['except' => 1],
    // ];

    public function render()
    {
        if ($this->search) {
            $menus = Menu::where('name', 'like', '%' . $this->search . '%')->paginate($this->limit);
        } else {
            $menus = Menu::paginate($this->limit);
        }

        return view('livewire.office.menu.index', compact('menus'));
    }
}
