<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class VehicleRequest extends FormRequest
{
    /**
     *
     * @return array
     */
    public function rules(): array
    {
        // Lấy ID của bản ghi đang được cập nhật (nếu là request PUT/PATCH)
        $vehicleId = $this->route('vehicle');

        // Trả về các quy tắc xác thực
        return [
            // license_plate: Yêu cầu, chuỗi, tối đa 255 ký tự, phải là duy nhất.
            'license_plate' => [
                'required',
                'string',
                'max:255',
                // Quy tắc unique được tùy chỉnh để bỏ qua bản ghi hiện tại khi cập nhật
                Rule::unique('vehicles', 'license_plate')->ignore($vehicleId),
            ],
            'type' => [
                'required',
                'string',
                'max:255',
            ],
            'brand' => [
                'required',
                'string',
                'max:255',
            ],
            'status' => [
                'nullable',
                'integer',
                // Thêm Rule::in nếu bạn có các giá trị status cụ thể (ví dụ: 0 là inactive, 1 là active)
                 Rule::in([0, 1]),
            ],
        ];
    }

    /**
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Tùy chỉnh tên thuộc tính (attribute names) hiển thị trong thông báo lỗi.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'license_plate' => 'biển số xe',
            'type' => 'loại xe',
            'brand' => 'hãng xe',
            'status' => 'trạng thái',
        ];
    }
}
