<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\EmployeeRequest;
use Modules\Admin\Services\EmployeeService;
use Symfony\Component\HttpFoundation\Response;

class EmployeeController extends Controller
{
    private  $employeeService;

    public function __construct()
    {
        $this->employeeService = app(EmployeeService::class);
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request):Response
    {
        return $this->employeeService->index($request);
    }

    /**
     * @param EmployeeRequest $request
     * @return Response
     */
    public function store(EmployeeRequest $request):Response
    {
        return $this->employeeService->store($request->validated());
    }

    /**
     * @param int $id
     * @return Response
     */
    public function show(int $id):Response
    {
        return $this->employeeService->show($id);
    }

    /**
     * @param EmployeeRequest $request
     * @param int $id
     * @return mixed
     */
    public function update(EmployeeRequest $request, int $id):Response
    {
        return $this->employeeService->update($id, $request->validated());
    }

    /**
     * @param int $id
     * @return Response
     */
    public function destroy(int $id):Response
    {
        return $this->employeeService->destroy($id);
    }

}
