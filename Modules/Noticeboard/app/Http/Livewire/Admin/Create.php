<?php

namespace Modules\Noticeboard\app\Http\Livewire\Admin;

use Livewire\Component;

class Create extends Component
{
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }

    public function render()
    {
        return view('noticeboard::livewire.admin.create');
    }
}
