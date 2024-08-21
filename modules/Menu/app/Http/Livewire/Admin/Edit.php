<?php

namespace Modules\Menu\app\Http\Livewire\Admin;

use Livewire\Component;
use Modules\Menu\app\Http\Requests\StoreMenuRequest;
use Modules\Menu\app\Models\Menu;

class Edit extends Component
{
    public $menu;

    public $parents;

    protected $listeners = ['refresh' => '$refresh'];

    public function render()
    {
        $this->parents = Menu::whereNull('parent_id')->whereNotIn('id', [$this->menu->id ?? null])->pluck('name', 'id')->toArray();

        return view('menu::livewire.admin.edit');
    }

    protected function rules()
    {
        $request = new StoreMenuRequest($this->menu->toArray());

        return $request->rules();
    }

    public function submit()
    {
        $this->validate();

        if (! $this->menu->priority) {
            $this->menu->priority = 1;
        }

        $this->menu->save();

        session()->flash('status', 'Menu updated successfully.');
        cache()->forget('menu.admin.sidebar');
        $this->emit('refresh_sidebar');
    }
}
