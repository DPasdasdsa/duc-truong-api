<?php

namespace Modules\Admin\Services;

use Illuminate\Support\Facades\Auth;
use Modules\Admin\Repositories\Admin\AdminRepositoryInterface;
use Symfony\Component\HttpFoundation\Response;

class AuthService extends BaseService
{
    /**
     * AuthService constructor.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function repository(): string
    {
        return AdminRepositoryInterface::class;
    }

    /**
     * @param array $credentials
     * @return Response
     */
    public function login(array $credentials): Response
    {
        if (!$token = Auth::guard('admin')->attempt($credentials)) {
            $code = STATUS_CODE['UNAUTHORIZED'] ?? 401;
            return $this->makeErrorResponse($code, 'Unauthorized. Email hoặc mật khẩu không chính xác.');
        }
        return $this->respondWithToken($token);
    }

    /**
     * @param string $token
     * @return Response
     */
    protected function respondWithToken(string $token): Response
    {
        $admin = Auth::guard('admin')->user();

        $data = [
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => Auth::guard('admin')->factory()->getTTL() * 60 * 60 * 24*30,
            'user' =>  $admin,
        ];

        return $this->makeSuccessResponse(
            STATUS_CODE['SUCCESS'] ?? 200,
            $data,
            'Login successful.'
        );
    }

    /**
     * @return Response
     */
    public function me(): Response
    {
        $admin = Auth::guard('admin')->user();

        return $this->makeSuccessResponse(
            STATUS_CODE['SUCCESS'] ?? 200,
            $admin,
            'User profile retrieved successfully.'
        );
    }


    public function logout(): Response
    {
        Auth::guard('admin')->logout();
        return $this->makeSuccessResponse(
            STATUS_CODE['SUCCESS'] ?? 200,
            null,
            'Successfully logged out.'
        );
    }

    /**
     * @return Response
     */
    public function refresh(): Response
    {
        $token = Auth::guard('admin')->refresh();
        return $this->respondWithToken($token);
    }


}
