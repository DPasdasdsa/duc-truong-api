<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\VehicleAssignmentService;

class VehicleAssigmentController extends Controller
{
    private  $vehicleAssignmentService;

    public function __construct()
    {
        $this->vehicleAssignmentService = app(VehicleAssignmentService::class);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->vehicleAssignmentService->index($request);
    }

}
