<?php

namespace Modules\Message\app\Http\Livewire;

use Livewire\Component;
use Modules\Message\app\Models\Conversation;
use Modules\User\app\Models\User;

class Index extends Component
{
    public $conversations;
    public User $user;

    public function render()
    {
        $data = [];
        $this->user = User::find(auth()->user()->id);
        $this->conversations = Conversation::whereCreatorId($this->user->id)->latest()->get();

        return view('message::livewire.index', $data);
    }
}
