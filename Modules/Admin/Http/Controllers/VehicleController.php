<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\VehicleService;

class VehicleController extends Controller
{
    private  $vehicleService;

    public function __construct()
    {
        $this->vehicleService = app(VehicleService::class);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->vehicleService->index($request);
    }

}
