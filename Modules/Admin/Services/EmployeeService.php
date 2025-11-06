<?php

namespace Modules\Admin\Services;

use Exception;
use Modules\Admin\Repositories\Employee\EmployeeRepositoryInterface;
use Modules\Admin\Transformers\Employee\EmployeeResource;
use Symfony\Component\HttpFoundation\Response;


class EmployeeService extends BaseService
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
        return EmployeeRepositoryInterface::class;
    }

    /**
     *
     * @param $request
     * @return Response
     */
    public function index($request): Response
    {
        try {
            $employees = $this->repository->paginate([], [], 10);
            return $this->makeSuccessResponse(
                STATUS_CODE['SUCCESS'], // 200
                EmployeeResource::collection($employees),
                'Lấy danh sách nhân viên thành công.'
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
            $employee = $this->repository->create($attributes);

            return $this->makeSuccessResponse(
                STATUS_CODE['SUCCESS'],
                new EmployeeResource($employee),
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
        $employee = $this->repository->findOne(['id' => $id]);

        if (empty($employee)) {
            return $this->makeErrorResponse(
                STATUS_CODE['NOT_FOUND'],
                'Không tìm thấy nhân viên.'
            );
        }

        return $this->makeSuccessResponse(
            STATUS_CODE['SUCCESS'],
            new EmployeeResource($employee)
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
                'Không tìm thấy nhân viên cần cập nhật.'
            );
        }

        try {
            $this->repository->update(['id' => $id], $attributes);
            // Lấy lại bản ghi đã cập nhật
            $updatedEmployee = $this->repository->findOne(['id' => $id]);

            return $this->makeSuccessResponse(
                STATUS_CODE['SUCCESS'], // 200
                new EmployeeResource($updatedEmployee),
                'Cập nhật nhân viên thành công.'
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
                'Không tìm thấy nhân viên cần xóa.'
            );
        }

        try {
            $this->repository->forceDelete(['id' => $id]);

            return $this->makeSuccessResponse(
                STATUS_CODE['SUCCESS'],
                null,
                'Xóa nhân viên thành công.'
            );
        } catch (Exception $e) {
            return $this->makeErrorResponse(
                STATUS_CODE['SERVER_ERROR'], // 500
                'Lỗi hệ thống: ' . $e->getMessage()
            );
        }
    }

}
