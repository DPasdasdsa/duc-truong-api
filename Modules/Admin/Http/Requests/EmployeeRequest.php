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
            // Trường 'phone' unique, required , loại trừ bản ghi hiện tại khi cập nhật
            'phone' => 'required|string|max:20|unique:employees,phone,' . $employeeId,
            'role' => 'required|in:driver,assistant',
            'status' => 'required'
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
