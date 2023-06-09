<?php

namespace Modules\User\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\Password;

class StoreUserRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user.first_name'   => ['bail', 'required', 'string', 'min:3', 'max:32'],
            'user.last_name'    => ['bail', 'required', 'string', 'min:3', 'max:32'],
            'user.username'     => ['bail', 'required', 'string', 'min:3', 'max:16', 'unique:users,username'],
            'user.phone'        => ['bail', 'required', 'numeric', 'starts_with:+,234,0', 'unique:users,phone'],
            'user.email'        => ['bail', 'required', 'email', 'min:3', 'max:32', 'unique:users,email'],
            'user.address'      => ['bail', 'nullable', 'string', 'max:160'],
            'password'          => ['bail', 'required', 'confirmed', Password::default()],
            'image'             => ['bail', 'nullable', 'image', 'mimes:png,jpg,svg'],
            'role'              => ['bail', 'nullable'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('admin.gatepass.create');
    }
}
