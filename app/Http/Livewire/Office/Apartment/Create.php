<?php

namespace App\Http\Livewire\Office\Apartment;

use App\Models\Apartment;
use Livewire\Component;

class Create extends Component
{
    public $apartment;
    public $edit = true;

    protected $listeners = ['refresh' => '$refresh'];

    protected $rules = [
        'apartment.name' => ['required', 'string', 'max:32'],
        // 'apartment.parent_id' => ['nullable', 'string'],
        // 'apartment.icon' => ['nullable', 'string'],
        // 'apartment.url' => ['required', 'string'],
        // 'apartment.tag' => ['nullable', 'string'],
        // 'apartment.priority' => ['nullable', 'integer'],
        'apartment.active' => ['nullable', 'boolean'],
    ];

    public function mount()
    {
        if (!$this->apartment) {
            $this->apartment = new Apartment();
            $this->edit = false;
        }
    }

    public function render()
    {
        return view('livewire.office.apartment.create');
    }

    public function submit()
    {
        $this->validate();

        $exists = Apartment::where('name', $this->apartment->name)->first();
        if ($exists) {
            session()->flash('status', "Apartment already exists.");
            return;
        }

        $this->apartment->save();

        $this->emitUp('refresh');

        if ($this->edit) {
            session()->flash('status', "Apartment updated successfully.");
        } else {
            session()->flash('status', "Apartment created successfully.");
            $this->reset();
        }
    }
}
