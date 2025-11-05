<?php

namespace Modules\Admin\Repositories\Employee;

use App\Models\Employee;
use Modules\Admin\Repositories\BaseRepository;


class EmployeeRepository extends BaseRepository implements EmployeeRepositoryInterface
{
    /**
     * Specify Model class name.
     *
     * @return string
     */
    public function model(): string
    {
        return Employee::class;
    }

}
