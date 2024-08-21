<?php

namespace Modules\Apartment\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreApartmentRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'apartment.name' => ['required', 'string', 'max:32', 'unique:apartments,name'],
            'apartment.active' => ['nullable', 'boolean'],
            'rooms' => ['nullable', 'numeric'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('apartment.create');
    }
}
