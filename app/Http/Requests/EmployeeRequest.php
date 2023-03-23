<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'employee.user_id'          => ['required', 'numeric'],
            'employee.department_id'    => ['required', 'numeric'],
            'employee.designation_id'   => ['required', 'numeric'],
            'employee.status_code'      => ['required', 'numeric'],
            'employee.employed_at'      => ['required'],
            'employee.about'            => ['nullable', 'max:255'],
            'image'                     => ['image', 'mimes:jpeg,png,jpg', 'max:5098'],
        ];
    }
}
