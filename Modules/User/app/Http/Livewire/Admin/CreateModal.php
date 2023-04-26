<?php

namespace Modules\User\app\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\User\app\Http\Requests\StoreUserRequest;
use Spatie\Permission\Models\Role;

class CreateModal extends Component
{
    use WithFileUploads;

    public $user;
    public $role_id;
    public $image;
    public function render()
    {
        $data = [];

        $data['roles'] = Role::whereNotIn('name', ['admin', 'super-admin'])->pluck('name', 'id')->toArray();

        return view('user::livewire.admin.create-modal', $data);
    }

    protected function rules()
    {
        $request = new StoreUserRequest();
        return $request->rules();
    }

    public function store()
    {
        $this->validate();

        dd($this->user);
    }
}
