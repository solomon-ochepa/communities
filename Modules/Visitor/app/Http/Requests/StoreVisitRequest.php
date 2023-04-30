<?php

namespace Modules\Visitor\app\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVisitRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'visit.reason'  => ['required', 'string'],
            'visit.arrived_at'  => ['required', 'date'],
            'visit.expired_at'  => ['required', 'date'],
            'form.user_id' => ['required', 'uuid'],
            'form.tenant_id' => ['required', 'uuid'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->can('visits.create');
    }
}
