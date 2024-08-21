<?php

namespace Modules\Apartment\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateApartmentRoomRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'room.name' => ['required', 'string', 'max:32', 'unique:rooms,name,'.$this->id],
            'room.active' => ['nullable', 'boolean'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('apartment.room.update');
    }
}
