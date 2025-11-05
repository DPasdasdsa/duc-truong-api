<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Services\TripService;

class TripController extends Controller
{
    private  $tripService;

    public function __construct()
    {
        $this->tripService = app(TripService::class);
    }


    /**
     * @param Request $request
     * @return mixed
     */
    public function index(Request $request)
    {
        return $this->tripService->index($request);
    }

}
