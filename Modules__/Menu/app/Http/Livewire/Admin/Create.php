<?php

namespace Modules\Menu\app\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Menu\app\Http\Requests\StoreMenuRequest;
use Modules\Menu\app\Models\Menu;

class Create extends Component
{
    public $menu;
    public $parents;
    public $edit = true;

    protected $listeners = ['refresh' => '$refresh'];

    public function mount()
    {
        if (!$this->menu) {
            $this->menu = new Menu();
            $this->edit = false;
        }
    }

    public function render()
    {
        $this->parents = Menu::whereNull('parent_id')->pluck('name', 'id')->toArray();

        return view('menu::livewire.admin.create');
    }

    protected function rules()
    {
        $request = new StoreMenuRequest();
        return $request->rules();
    }

    public function submit()
    {
        $this->validate();

        if (!$this->menu->priority) {
            $this->menu->priority = 1;
        }

        $this->menu->save();
        cache()->forget('menu.admin.sidebar');

        if ($this->edit) {
            session()->flash('status', "Menu updated successfully.");
            $this->emit('refresh_sidebar');
        } else {
            session()->flash('status', "Menu created successfully.");
            $this->emit('refresh_sidebar');
            $this->reset('menu');

            // return redirect(route('admin.menu.index'));
        }
    }
}
