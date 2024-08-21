<?php

namespace Modules\Gatepass\app\Http\Livewire\Admin;

use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Modules\Category\app\Models\Categorizable;
use Modules\Category\app\Models\Category;
use Modules\Gatepass\app\Models\Gatepass;
use Modules\User\app\Http\Requests\StoreUserRequest;
use Modules\User\app\Models\User;
use Plank\Mediable\Facades\MediaUploader;

class UpdateModal extends Component
{
    use WithFileUploads, WithPagination;

    public $user;

    public $image;

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
        $data['users'] = User::paginate(25);
        $data['create'] = User::whereDoesntHave('gatepass')->count();
        $data['delete'] = Gatepass::whereDoesntHave('user')->count();

        return view('gatepass::livewire.admin.update-modal', $data);
    }

    protected function rules()
    {
        $request = new StoreUserRequest;

        return $request->rules();
    }

    public function updated($name, $value)
    {
        $this->validateOnly($name);
    }

    public function submit()
    {
        // $this->validate();

        // Create
        User::whereDoesntHave('gatepass')->each(function ($model) {
            // Generate unique code
            $code = $model->code ?? $model->nin ?? $model->phone ?? Str::random(11);
            while (Gatepass::whereCode($code)->first()) {
                $code = Str::random(11);
            }

            $gatepass = $model->gatepass()->create([
                'code' => str_ireplace([' ', '-', ',', '.', '+'], '', $code),
            ]);

            // Category
            // users [occupant, visitor, driver], guest [...]
            $category_name = Str::afterLast(get_class($model), '\\');
            $category = Category::firstOrCreate([
                'name' => $category_name,
            ]);

            Categorizable::firstOrCreate([
                'category_id' => $category->id,
                'categorizable_type' => get_class($gatepass),
                'categorizable_id' => $gatepass->id,
            ]);

            // Generate Barcode
            $barcode = barcode($gatepass->code, "{$gatepass->code}", 'ean-128', [
                'f' => 'svg', 'h' => '40px', 'pt' => '2px', 'ph' => '2px',
            ]);

            // Upload barcode
            $media = MediaUploader::fromString($barcode)
                ->useFilename($gatepass->code)
                ->toDirectory('images/gatepass/barcode')
                ->upload();

            $gatepass->syncMedia($media, ['barcode']);
        });

        session()->flash('status', 'Gatepass updated successfully.');
        $this->init();
        $this->emit('refresh');
    }
}
