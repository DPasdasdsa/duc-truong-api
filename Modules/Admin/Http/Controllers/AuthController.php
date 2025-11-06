<?php

namespace Modules\Admin\Http\Controllers;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Routing\Controller;
use Modules\Admin\Http\Requests\AuthRequest;
use Modules\Admin\Services\AuthService;

class AuthController extends Controller
{
    private $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    /**
     * @param AuthRequest $request
     * @return Response
     */
    public function login(AuthRequest $request):Response
    {
        return $this->authService->login($request->only('email', 'password'));
    }


    /**
     * @return Response
     */
    public function me():Response
    {
        return $this->authService->me();
    }


    /**
     * @return Response
     */
    public function logout():Response
    {
        return $this->authService->logout();
    }


    /**
     * @return Response
     */
    public function refresh():Response
    {
        return $this->authService->refresh();
    }
}
