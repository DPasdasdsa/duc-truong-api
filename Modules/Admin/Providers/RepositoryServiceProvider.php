<?php

namespace Modules\Admin\Providers;

use Illuminate\Support\ServiceProvider;
use Modules\Admin\Repositories\Admin\AdminRepository;
use Modules\Admin\Repositories\Admin\AdminRepositoryInterface;
use Modules\Admin\Repositories\Employee\EmployeeRepository;
use Modules\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use Modules\Admin\Repositories\Route\RouteRepository;
use Modules\Admin\Repositories\Route\RouteRepositoryInterface;
use Modules\Admin\Repositories\Trip\TripRepository;
use Modules\Admin\Repositories\Trip\TripRepositoryInterface;
use Modules\Admin\Repositories\User\UserRepository;
use Modules\Admin\Repositories\User\UserRepositoryInterface;
use Modules\Admin\Repositories\Vehicle\VehicleRepository;
use Modules\Admin\Repositories\Vehicle\VehicleRepositoryInterface;
use Modules\Admin\Repositories\VehicleAssignment\VehicleAssignmentRepository;
use Modules\Admin\Repositories\VehicleAssignment\VehicleAssignmentRepositoryInterface;


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
        $this->app->bind(AdminRepositoryInterface::class, AdminRepository::class);
        $this->app->bind(EmployeeRepositoryInterface::class, EmployeeRepository::class);
        $this->app->bind(RouteRepositoryInterface::class, RouteRepository::class);
        $this->app->bind(TripRepositoryInterface::class, TripRepository::class);
        $this->app->bind(VehicleRepositoryInterface::class, VehicleRepository::class);
        $this->app->bind(VehicleAssignmentRepositoryInterface::class, VehicleAssignmentRepository::class);
    }
}
