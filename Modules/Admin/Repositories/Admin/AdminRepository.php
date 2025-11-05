<?php

namespace Modules\Admin\Repositories\Admin;

use App\Models\Admin;
use Modules\Admin\Repositories\BaseRepository;


class AdminRepository extends BaseRepository implements AdminRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model(): string
    {
        return Admin::class;
    }

}
