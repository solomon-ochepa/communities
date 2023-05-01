<?php

namespace Modules\Message\app\Http\Livewire;

use Livewire\Component;
use Modules\Contact\app\Models\Contact;

class Contacts extends Component
{
    public $conversations;
    public $search = '';

    public function render()
    {
        $data = [];

        $data['contacts'] = Contact::whereUserId(auth()->id())->with(['user']);

        return view('message::livewire.contacts', $data);
    }
}
