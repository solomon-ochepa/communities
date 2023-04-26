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
            'user.first_name'   => ['required', 'string', 'min:3', 'max:32'],
            'user.last_name'    => ['required', 'string', 'min:3', 'max:32'],
            'user.username'     => ['required', 'string', 'min:3', 'max:16', 'unique:users,username'],
            'user.phone'        => ['required', 'numeric', 'max:16', 'unique:users,phone'],
            'user.email'        => ['required', 'email', 'min:3', 'max:32', 'unique:users,email'],
            'user.password'     => ['required', 'confirmed', 'string', Password::required()],
            'user.address'      => ['nullable', 'string', 'max:160'],
            'image'             => ['nullable', 'image', 'mimes:png,jpg,svg'],
            'role_id'           => ['required', 'uuid'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('users.create');
    }
}
