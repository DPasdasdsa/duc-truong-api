<?php

namespace Modules\Admin\Services;

use Modules\Admin\Constants\Constant;
use Modules\Admin\Repositories\Vehicle\VehicleRepositoryInterface;
use Modules\Admin\Transformers\Vehicle\VehicleResource;
use Symfony\Component\HttpFoundation\Response;
use Exception;


class VehicleService extends BaseService
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
        return VehicleRepositoryInterface::class;
    }

    public function index($request): Response
    {
        try {
            $subQuery = function ($q) use ($request) {
                if(!empty($request->keyword)) {
                    $q->where('license_plate', 'like', '%' . $request->keyword . '%')
                        ->orWhere('license_plate', 'like', '%' . $request->keyword . '%');
                }
                return $q;
            };

            $employees = $this->repository->paginate($subQuery, ['id' => 'DESC'], Constant::LIMIT_ITEM);
            return $this->makeSuccessResponse(
                STATUS_CODE['SUCCESS'], // 200
                new VehicleResource($employees),
                'Lấy danh sách xe thành công.'
            );
        } catch (Exception $e) {
            return $this->makeErrorResponse(
                STATUS_CODE['SERVER_ERROR'],
                'Lỗi hệ thống: ' . $e->getMessage()
            );
        }
    }

    /**
     *
     * @param array $attributes
     * @return Response
     */
    public function store(array $attributes): Response
    {
        try {
            $this->repository->create($attributes);
            return $this->makeSuccessResponse(
                STATUS_CODE['SUCCESS'],
                null,
                'Thêm mới thành công !'
            );
        } catch (Exception $e) {
            return $this->makeErrorResponse(
                STATUS_CODE['SERVER_ERROR'],
                'Lỗi hệ thống: ' . $e->getMessage()
            );
        }
    }

    /**
     *
     * @param int $id
     * @return Response
     */
    public function show(int $id): Response
    {
        $vehicle = $this->repository->findOne(['id' => $id]);

        if (empty($vehicle)) {
            return $this->makeErrorResponse(
                STATUS_CODE['NOT_FOUND'],
                'Không tìm thấy thông tin xe.'
            );
        }

        return $this->makeSuccessResponse(
            STATUS_CODE['SUCCESS'],
            $vehicle
        );
    }

    /**
     *
     * @param int $id
     * @param array $attributes
     * @return Response
     */
    public function update(int $id, array $attributes): Response
    {
        $check = $this->repository->findOne(['id' => $id]);

        if (empty($check)) {
            return $this->makeErrorResponse(
                STATUS_CODE['NOT_FOUND'], // 404
                'Không tìm thấy xe cần cập nhật.'
            );
        }

        try {

            $this->repository->update(['id' => $id], $attributes);

            return $this->makeSuccessResponse(
                STATUS_CODE['SUCCESS'], // 200
                null,
                'Cập nhật xe thành công.'
            );
        } catch (Exception $e) {
            return $this->makeErrorResponse(
                STATUS_CODE['SERVER_ERROR'], // 500
                'Lỗi hệ thống: ' . $e->getMessage()
            );
        }
    }

    /**
     *
     * @param int $id
     * @return Response
     */
    public function destroy(int $id): Response
    {
        $check = $this->repository->findOne(['id' => $id]);

        if (empty($check)) {
            return $this->makeErrorResponse(
                STATUS_CODE['NOT_FOUND'],
                'Không tìm thấy xe cần xóa.'
            );
        }

        try {
            $this->repository->forceDelete(['id' => $id]);

            return $this->makeSuccessResponse(
                STATUS_CODE['SUCCESS'],
                null,
                'Xóa xe thành công.'
            );
        } catch (Exception $e) {
            return $this->makeErrorResponse(
                STATUS_CODE['SERVER_ERROR'], // 500
                'Lỗi hệ thống: ' . $e->getMessage()
            );
        }
    }

}
