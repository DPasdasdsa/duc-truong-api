<?php

namespace Modules\Admin\Transformers\Route;

use Illuminate\Http\Resources\Json\JsonResource;

class RouteResource extends JsonResource
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
                'name' => $val->name,
                'code' => $val->code,
                'departure_location' => $val->departure_location,
                'arrival_location' => $val->arrival_location,
                'distance_km' => $val->distance_km,
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
