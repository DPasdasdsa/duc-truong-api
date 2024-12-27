<?php

namespace Modules\Admin\Repositories\User;

use App\Models\User;
use Modules\Admin\Repositories\RepositoryInterface;

/**
 * Interface UserRepositoryInterface.
 */
interface UserRepositoryInterface extends RepositoryInterface
{
    /**
     * Login.
     *
     * @param array $params
     *
     * @return User|null
     */
    public function login(array $params): ?User;

}
