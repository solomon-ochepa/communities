<?php

namespace Modules\Message\app\Http\Livewire;

use Livewire\Component;
use Modules\Message\app\Http\Requests\StoreMessageRequest;

class Compose extends Component
{
    public $message;

    public function render()
    {
        return view('message::livewire.compose');
    }

    protected function rules()
    {
        $request = new StoreMessageRequest;

        return $request->rules();
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }

    public function submit()
    {
        $this->validate();

        // conversation

        dd($this->message);

        // message

        //
    }
}
