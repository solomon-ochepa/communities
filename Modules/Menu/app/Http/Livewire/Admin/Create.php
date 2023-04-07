<?php

namespace Modules\Menu\app\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Menu\app\Http\Requests\StoreMenuRequest;
use Modules\Menu\app\Models\Menu;

class Create extends Component
{
    public $menu;
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

        if ($this->edit) {
            session()->flash('status', "Menu updated successfully.");

            $this->emitUp('refresh');
        } else {
            session()->flash('status', "Menu created successfully.");

            return redirect(route('admin.menu.index'));
        }
    }
}
