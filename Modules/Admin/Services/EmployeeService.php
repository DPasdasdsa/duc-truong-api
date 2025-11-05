<?php

namespace Modules\Admin\Services;

use Modules\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class EmployeeService extends BaseService
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
        return EmployeeRepositoryInterface::class;
    }

}
