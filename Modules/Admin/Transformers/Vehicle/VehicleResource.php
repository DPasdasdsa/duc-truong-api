<?php

namespace Modules\Admin\Transformers\Vehicle;

use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        $data = [];
        foreach ($this->resource as $val) {
            $data[] = [
                'id' => $val->id,
                'license_plate' => $val->license_plate,
                'type' => $val->type,
                'brand' => $val->brand,
                'status' => $val->status,
                'created_at' => $val->created_at->format(' H:i:s d-m-Y'),
            ];
        }
        return [
            'data' => $data,
            'meta' => [
                'current_page' => $this->resource->currentPage(),
                'total_page' => $this->resource->lastPage(),
                'total' => $this->resource->total(),
                'perPage' => $this->resource->perPage(),
            ]
        ];

    }
}
