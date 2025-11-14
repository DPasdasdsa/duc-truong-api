<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\VehicleRequest;
use Modules\Admin\Services\VehicleService;
use Symfony\Component\HttpFoundation\Response;

class VehicleController extends Controller
{
    private  $vehicleService;

    public function __construct()
    {
        $this->vehicleService = app(VehicleService::class);
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request):Response
    {
        return $this->vehicleService->index($request);
    }

    /**
     * @param VehicleRequest $request
     * @return Response
     */
    public function store(VehicleRequest $request):Response
    {
        return $this->vehicleService->store($request->validated());
    }

    /**
     * @param int $id
     * @return Response
     */
    public function show(int $id):Response
    {
        return $this->vehicleService->show($id);
    }

    /**
     * @param VehicleRequest $request
     * @param int $id
     * @return mixed
     */
    public function update(VehicleRequest $request, int $id):Response
    {
        return $this->vehicleService->update($id, $request->validated());
    }

    /**
     * @param int $id
     * @return Response
     */
    public function destroy(int $id):Response
    {
        return $this->vehicleService->destroy($id);
    }

}
