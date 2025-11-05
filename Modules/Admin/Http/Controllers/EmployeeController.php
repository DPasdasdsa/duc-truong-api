<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\EmployeeService;

class EmployeeController extends Controller
{
    private  $employeeService;

    public function __construct()
    {
        $this->employeeService = app(EmployeeService::class);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
       return $this->employeeService->index($request);
    }

}
