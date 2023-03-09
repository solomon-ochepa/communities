<?php

namespace App\Http\Livewire\Office\Menu;

use App\Models\Menu;
use Livewire\Component;

class Create extends Component
{
    public $menu;
    public $edit = true;

    protected $listeners = ['refresh' => '$refresh'];

    protected $rules = [
        'menu.name' => ['required', 'string', 'max:32'],
        'menu.parent_id' => ['nullable', 'string'],
        'menu.icon' => ['nullable', 'string'],
        'menu.url' => ['required', 'string'],
        'menu.tag' => ['nullable', 'string'],
        'menu.priority' => ['nullable', 'integer'],
        'menu.active' => ['nullable', 'boolean'],
    ];

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

    public function submit()
    {
        $this->validate();

        if (!$this->menu->priority) {
            $this->menu->priority = null;
        }

        $this->menu->save();

        if ($this->edit) {
            session()->flash('status', "Menu updated successfully.");
        } else {
            session()->flash('status', "Menu created successfully.");
            $this->reset();
        }

        $this->emitUp('refresh');
    }
}
