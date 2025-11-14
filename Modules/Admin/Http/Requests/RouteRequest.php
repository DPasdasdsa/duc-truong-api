<?php

namespace Modules\Admin\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RouteRequest extends FormRequest
{
    /**
     *
     * @return array
     */
    public function rules(): array
    {
        $routeId = $this->route('route');

        return [
            // name: Yêu cầu, là chuỗi, tối đa 255 ký tự.
            'name' => [
                'required',
                'string',
                'max:255',
            ],

            // departure_location: Không bắt buộc (nullable), là chuỗi.
            'departure_location' => [
                'nullable',
                'string',
                'max:255',
            ],

            // arrival_location: Không bắt buộc (nullable), là chuỗi.
            'arrival_location' => [
                'nullable',
                'string',
                'max:255',
            ],

            // distance_km: Không bắt buộc (nullable), có thể là số hoặc chuỗi (nếu lưu kèm đơn vị).
            'distance_km' => [
                'nullable',
                'string', // Dựa trên migration (2025_11_05_035702_create_routes.php) là string.
                'max:255',
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
     * Tùy chỉnh tên thuộc tính hiển thị trong thông báo lỗi.
     *
     * @return array
     */
    public function attributes(): array
    {
        return [
            'name' => 'Tên tuyến đường',
            'code' => 'Mã tuyến đường',
            'departure_location' => 'Điểm khởi hành',
            'arrival_location' => 'Điểm đến',
            'distance_km' => 'Khoảng cách (km)',
        ];
    }
}
