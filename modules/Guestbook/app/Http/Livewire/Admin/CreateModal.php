<?php

namespace Modules\Guestbook\app\Http\Livewire\Admin;

use Livewire\Component;

class CreateModal extends Component
{
    public function render()
    {
        return view('guestbook::livewire.admin.create-modal');
    }
}
