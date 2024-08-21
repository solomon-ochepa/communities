<?php

namespace Modules\Menu\app\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Menu\app\Models\Menu;

class Index extends Component
{
    use WithPagination;

    public $selected = [];

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
            $data['menus'] = Menu::where('name', 'like', '%'.$this->search.'%')
                ->orWhere('url', 'like', '%'.$this->search.'%')
                ->orWhere('icon', 'like', '%'.$this->search.'%')
                ->paginate($this->limit);
        } else {
            $data['menus'] = Menu::paginate($this->limit);
        }

        return view('menu::livewire.admin.index', $data);
    }
}
