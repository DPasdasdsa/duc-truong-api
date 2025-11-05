<?php

namespace Modules\Admin\Services;

use Modules\Admin\Repositories\Trip\TripRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class TripService extends BaseService
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
        return TripRepositoryInterface::class;
    }

}
