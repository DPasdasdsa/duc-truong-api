<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Repositories\User\UserRepository;
use Modules\Admin\Repositories\User\UserRepositoryInterface;


/**
 * Class RepositoryServiceProvider
 *
 * @package Modules\Admin\Providers
 */
class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register repositories.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
    }
}
