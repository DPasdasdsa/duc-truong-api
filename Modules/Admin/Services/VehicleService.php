<?php

namespace Modules\Admin\Services;

use Modules\Admin\Repositories\Vehicle\VehicleRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class VehicleService extends BaseService
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
        return VehicleRepositoryInterface::class;
    }

}
