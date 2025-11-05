<?php

namespace Modules\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedAdmin
{

    public function handle(Request $request, Closure $next)
    {
        if (Auth::guard('admin')->check()) {
            return $next($request);
        }

        return $this->unauthorizedResponse();
    }
    protected function unauthorizedResponse(): JsonResponse
    {
        $code = STATUS_CODE['UNAUTHORIZED'];

        $response = [
            'status' => [
                'code' => $code,
                'message' => 'Unauthorized. Access token is invalid or missing.'
            ],
        ];

        return new JsonResponse($response, $code);
    }
}
