<?php

namespace Modules\Admin\Repositories\VehicleAssignment;

use App\Models\VehicleAssignment;
use Modules\Admin\Repositories\BaseRepository;


class VehicleAssignmentRepository extends BaseRepository implements VehicleAssignmentRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model(): string
    {
        return VehicleAssignment::class;
    }

}
