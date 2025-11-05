<?php

namespace Modules\Admin\Services;

use Modules\Admin\Repositories\VehicleAssignment\VehicleAssignmentRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class VehicleAssignmentService extends BaseService
{
    /**
     * AuthService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function repository(): string
    {
        return VehicleAssignmentRepositoryInterface::class;
    }

}
