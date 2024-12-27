<?php

namespace Modules\Admin\Services;

use Illuminate\Http\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

abstract class BaseService
{
    /**
     * @var $repository
     */
    public $repository;


    /**
     * BaseService constructor.
     */
    public function __construct()
    {
        $this->repository = app($this->repository());
    }

    /**
     * Abstract repository
     *
     * @return string
     */
    public abstract function repository(): string;

    /**
     * Make error response.
     *
     * @param int $code
     * @param string $message
     * @return Response
     */
    public function makeErrorResponse(int $code, string $message): Response
    {
        $response = [
            'status' => [
                'code' => $code,
                'message' => $message
            ],
        ];
        return new JsonResponse($response, $code);
    }

    /**
     * Make success response.
     *
     * @param int $code
     * @param $data
     * @param string|null $message
     * @return Response
     */
    public function makeSuccessResponse(int $code, $data = null, string $message = null): Response
    {
        $response = [
            'status' => [
                'code' => $code,
                'message' => $message
            ],
        ];
        if ($data) {
            $response['data'] = $data;
        }
        return new JsonResponse($response, $code);
    }
}
