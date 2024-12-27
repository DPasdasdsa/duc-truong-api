<?php

namespace Modules\Admin\Services;

use Modules\Admin\Http\Resources\User\UserResource;
use Modules\Admin\Repositories\User\UserRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class AuthService extends BaseService
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
        return UserRepositoryInterface::class;
    }

    /**
     * Index.
     *
     * @return Response
     */
    public function index(): Response
    {
        return $this->makeSuccessResponse(
            STATUS_CODE['SUCCESS'],
            new UserResource([])
        );
    }
}
