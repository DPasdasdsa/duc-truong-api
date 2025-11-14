<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\RouteRequest;
use Modules\Admin\Services\RouteService;
use Symfony\Component\HttpFoundation\Response;

class RouteController extends Controller
{
    private  $routeService;

    public function __construct()
    {
        $this->routeService = app(RouteService::class);
    }


    /**
     * @param Request $request
     * @return Response
     */
    public function index(Request $request):Response
    {
        return $this->routeService->index($request);
    }

    /**
     * @param RouteRequest $request
     * @return Response
     */
    public function store(RouteRequest $request):Response
    {
        return $this->routeService->store($request->validated());
    }

    /**
     * @param int $id
     * @return Response
     */
    public function show(int $id):Response
    {
        return $this->routeService->show($id);
    }

    /**
     * @param RouteRequest $request
     * @param int $id
     * @return Response
     */
    public function update(RouteRequest $request, int $id):Response
    {
        return $this->routeService->update($id, $request->validated());
    }

    /**
     * @param int $id
     * @return Response
     */
    public function destroy(int $id):Response
    {
        return $this->routeService->destroy($id);
    }

}
