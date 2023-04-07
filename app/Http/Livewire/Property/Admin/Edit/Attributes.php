<?php

namespace App\Http\Livewire\Property\Admin\Edit;

use Modules\Attribute\app\Models\Attributable;
use Illuminate\Support\Arr;
use Livewire\Component;

class Attributes extends Component
{
    public $property;

    public $attributes = [
        ['attribute' => '', 'option' => '']
    ];

    protected $listerners = ['refresh' => '$refresh'];

    public function render()
    {
        return view('livewire.property.admin.edit.attributes');
    }

    public function add()
    {
        $this->attributes[] = ['attribute' => '', 'option' => ''];

        $this->emit('refresh');
    }

    public function remove($id)
    {
        Arr::forget($this->attributes, $id);

        $this->emit('refresh');
    }

    public function delete(Attributable $attributable)
    {
        $attributable->delete();

        session()->flash('status', 'Deleted');
        $this->property->refresh();
        $this->emit('refresh');
    }
}
