<?php

namespace Modules\Menu\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMenuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'menu.name'         => ['required', 'string', 'max:16'],
            'menu.parent_id'    => ['nullable', 'string', 'uuid'],
            'menu.icon'         => ['nullable', 'string'],
            'menu.url'          => ['required', 'string'],
            'menu.priority'     => ['nullable', 'integer'],
            'menu.active'       => ['nullable', 'boolean'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('menu.create');
    }
}
