<?php

namespace Modules\Guestbook\app\Http\Livewire\Admin;

use Livewire\Component;

class EditModal extends Component
{
    public function render()
    {
        return view('guestbook::livewire.admin.edit-modal');
    }
}
