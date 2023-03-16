<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('menu.create');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'menu.name'         => ['required', 'string', 'max:32'],
            'menu.parent_id'    => ['nullable', 'string', 'uuid'],
            'menu.icon'         => ['nullable', 'string'],
            'menu.url'          => ['required', 'string'],
            'menu.tag'          => ['nullable', 'string'],
            'menu.priority'     => ['nullable', 'integer'],
            'menu.active'       => ['nullable', 'boolean'],
        ];
    }
}
