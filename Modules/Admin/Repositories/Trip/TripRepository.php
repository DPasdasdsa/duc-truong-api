<?php

namespace Modules\Admin\Repositories\Trip;

use App\Models\Route;
use App\Models\Trip;
use Modules\Admin\Repositories\BaseRepository;


class TripRepository extends BaseRepository implements TripRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model(): string
    {
        return Trip::class;
    }

}
