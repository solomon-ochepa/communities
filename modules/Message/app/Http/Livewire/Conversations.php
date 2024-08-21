<?php

namespace Modules\Message\app\Http\Livewire;

use Livewire\Component;
use Modules\User\app\Models\User;

class Conversations extends Component
{
    public $conversations;

    public $search = '';

    public function render()
    {
        $data = [];

        if ($this->search) {
            $data['searches']['contacts'] = User::where('username', 'like', '%'.$this->search.'%')
                ->orWhere('phone', 'like', '%'.$this->search.'%')
                ->orWhere('email', 'like', '%'.$this->search.'%')
                ->get()
                ->except(auth()->id());

            $data['searches']['groups'] = [];

            $data['searches']['messages'] = [];
        }

        return view('message::livewire.conversations', $data);
    }
}
