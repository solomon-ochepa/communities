<?php

namespace Modules\Occupant\App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOccupantRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'occupant.user_id' => ['required', 'uuid'],
            'occupant.apartment_id' => ['nullable', 'required_without:occupant.room_id', 'uuid'],
            'occupant.room_id' => ['nullable', 'sometimes', 'required_without:occupant.apartment_id', 'string'],
            'occupant.active' => ['nullable', 'boolean'],
            'occupant.status_code' => ['nullable', 'integer'],
            'form.moved_in' => ['required', 'date'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->user()->can('occupants.create');
    }
}
