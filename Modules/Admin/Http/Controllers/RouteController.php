<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\RouteService;

class RouteController extends Controller
{
    private  $routeService;

    public function __construct()
    {
        $this->routeService = app(RouteService::class);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->routeService->index($request);
    }

}
