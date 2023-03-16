<?php

namespace App\Http\Livewire\Office\Menu;

use App\Http\Requests\StoreMenuRequest;
use App\Models\Menu;
use Livewire\Component;

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
        return view('livewire.office.menu.create');
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

            return redirect(route('office.menu.index'));
        }
    }
}
