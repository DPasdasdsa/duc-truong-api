<?php

namespace Modules\Admin\Repositories\Vehicle;

use App\Models\Vehicle;
use Modules\Admin\Repositories\BaseRepository;


class VehicleRepository extends BaseRepository implements VehicleRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model(): string
    {
        return Vehicle::class;
    }

}
