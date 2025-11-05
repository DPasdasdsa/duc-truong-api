<?php

namespace Modules\Admin\Repositories\Route;

use App\Models\Route;
use Modules\Admin\Repositories\BaseRepository;


class RouteRepository extends BaseRepository implements RouteRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model(): string
    {
        return Route::class;
    }

}
