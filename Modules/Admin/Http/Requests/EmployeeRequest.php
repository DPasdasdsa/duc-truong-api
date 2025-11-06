<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules():array
    {
        $employeeId = $this->route('employee');

        return [
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255|unique:employees,code,' . $employeeId,
            'phone' => 'nullable|string|max:20',
            'role' => 'required|in:driver,assistant',
            'status' => 'required|integer|in:0,1',
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
    }
}
