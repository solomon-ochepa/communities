<?php

namespace Modules\Tenant\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTenantRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tenant.user_id'   => ['required', 'uuid'],
            'tenant.apartment_id'   => ['nullable', 'required_without:tenant.room_id', 'uuid'],
            'tenant.room_id'   => ['nullable', 'required_without:tenant.apartment_id', 'uuid'],
            'tenant.active'   => ['nullable', 'boolean'],
            'tenant.status_code'   => ['nullable', 'integer'],
            'tenant.moved_in'   => ['required', 'date'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('tenant.create');
    }
}
