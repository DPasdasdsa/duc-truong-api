<?php

namespace Modules\Admin\Repositories\User;

use App\Models\User;
use Modules\Admin\Repositories\BaseRepository;

/**
 * Class UserRepository.
 *
 * @package Modules\Admin\Repositories\User
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model(): string
    {
        return User::class;
    }

    /**
     * Login.
     *
     * @param array $params
     *
     * @return User|null
     */
    public function login(array $params): ?User
    {
        return $this->model
            ->where([
                'email' => $params['email'],
                'password' => $params['password'],
            ])
            ->first();
    }
}
