<?php

namespace Modules\Room\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRoomRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'room.roomable_id' => ['required', 'uuid'],
            'room.roomable_type' => ['required', 'string'],
            'room.name' => ['required', 'string', 'max:32'],
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
        return true;
        // return $this->user()->can('example.create');
    }
}
