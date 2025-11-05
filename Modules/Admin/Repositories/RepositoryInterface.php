<?php

namespace Modules\Admin\Repositories;

interface RepositoryInterface
{
    /**
     * Lấy tất cả bản ghi theo điều kiện
     */
    public function findAll($conditions = [], $sort = [], $with = false, $limit = 0, $select = '', $lockForUpdate = false);

    /**
     * Lấy dữ liệu phân trang
     */
    public function paginate($conditions = [], $sort = [], $limit = 25, $with = false, $select = '');

    /**
     * Lấy 1 bản ghi duy nhất
     */
    public function findOne($conditions = [], $latest = false, $select = '', $lockForUpdate = false, $with = false);

    /**
     * Tạo mới 1 hoặc nhiều bản ghi
     */
    public function create($attributes = [], $multiple = false);

    /**
     * Cập nhật bản ghi theo điều kiện
     */
    public function update($conditions = [], $attributes = []);

    /**
     * Xóa mềm bản ghi (status = 0)
     */
    public function delete($id = []);

    /**
     * Xóa cứng bản ghi khỏi DB
     */
    public function forceDelete($conditions = []);

    /**
     * Đếm số lượng bản ghi theo điều kiện
     */
    public function count($conditions = [], $field_count = '*');

    /**
     * Tính tổng 1 cột
     */
    public function sum($conditions = [], $field_count = '*');

    /**
     * Cập nhật hoặc tạo mới
     */
    public function updateOrCreate($unique = [], $attributes = [], $isForce = false);

    /**
     * Đặt kết nối database (dành cho trường hợp dùng nhiều connection)
     */
    public function setConnection($connection);

    /**
     * Giảm giá trị của 1 cột
     */
    public function decrement($conditions = [], $field, $number);
}
