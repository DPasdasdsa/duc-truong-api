<?php

namespace Modules\Admin\Services;

use Modules\Admin\Repositories\Route\RouteRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class RouteService extends BaseService
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
        return RouteRepositoryInterface::class;
    }

}
