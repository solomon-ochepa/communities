<?php

namespace Modules\Gatepass\app\Http\Livewire\Admin;

use Modules\User\app\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\User\app\Http\Requests\StoreUserRequest;
use Plank\Mediable\Facades\MediaUploader;
use Spatie\Permission\Models\Role;

class CreateModal extends Component
{
    use WithFileUploads;

    public $user;
    public $role;
    public $image;
    public $password;
    public $password_confirmation;

    public function mount()
    {
        $this->init();
    }

    public function init()
    {
        $this->user = [];
    }

    public function render()
    {
        $data = [];

        $data['roles'] = Role::whereNotIn('name', ['admin', 'super-admin'])->pluck('name', 'id')->toArray();

        return view('gatepass::livewire.admin.create-modal', $data);
    }

    protected function rules()
    {
        $request = new StoreUserRequest();
        return $request->rules();
    }

    public function updated($name, $value)
    {
        $this->validateOnly($name);
    }

    public function store()
    {
        $this->validate();

        $this->user['password'] = Hash::make($this->password);

        $this->user = new User($this->user);
        $this->user->save();
        $this->user->refresh();

        if ($this->role)
            $this->user->syncRoles(2);

        if ($this->image) {
            $media = MediaUploader::fromSource($this->image)
                ->useHashForFilename()
                ->toDirectory('image')
                ->upload();

            if ($media)
                $this->user->attachMedia($media, ['profile', 'image']);
        }

        event(new Registered($this->user));

        session()->flash('status', 'User has been created successfully.');
        $this->reset();
        $this->init();
        $this->emit('refresh');
    }
}
