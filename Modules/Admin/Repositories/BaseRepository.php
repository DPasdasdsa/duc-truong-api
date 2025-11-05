<?php

namespace Modules\Admin\Repositories;

abstract class BaseRepository implements RepositoryInterface
{
    const WITH_TABLE     = false;
    const LIMIT          = 0;
    const LIMIT_PAGINATE = 25;

    protected $model;

    public function __construct()
    {
        $this->setModel();
    }

    abstract public function model();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->model()
        );
    }

    public function findAll($conditions = [], $sort = [], $with = self::WITH_TABLE, $limit = self::LIMIT, $select = '', $lockForUpdate = false) //use "with" eager loading to avoid N+1 query

    {
        $q = $this->model;

        if (!empty($select)) {
            $q = $q->select($select);
        }

        if (!empty($with)) {
            $q = $q->with($with);
        }

        if (!empty($conditions)) {
            $q = $q->where($conditions);
        }

        if (!empty($sort)) {
            foreach ($sort as $column => $order) {
                $q = $q->orderBy($column, $order);
            }
        }

        if (!empty($limit)) {
            $q = $q->limit($limit);
        }

        if (!empty($lockForUpdate)) {
            $q = $q->lockForUpdate();
        }

        return $q->get();
    }

    public function paginate($conditions = [], $sort = [], $limit = self::LIMIT_PAGINATE, $with = self::WITH_TABLE, $select = '')
    {
        $q = $this->model;

        if (!empty($select)) {
            $q = $q->select($select);
        }

        if (!empty($with)) {
            $q = $q->with($with);
        }

        if (!empty($conditions)) {
            $q = $q->where($conditions);
        }

        if (!empty($sort)) {
            foreach ($sort as $column => $order) {
                $q = $q->orderBy($column, $order);
            }
        }

        return $q->paginate($limit);
    }

    public function findOne($conditions = [], $latest = false, $select = '', $lockForUpdate = false, $with = self::WITH_TABLE)
    {
        $q = $this->model;

        if (!empty($select)) {
            $q = $q->select($select);
        }

        if (!empty($with)) {
            $q = $q->with($with);
        }

        if (is_array($conditions)) {
            if (!empty($lockForUpdate)) {
                // Ngăn chặn bị race condition trùng lặp dữ liệu khi insert mà chưa check xong
                return $latest ? $q->where($conditions)->latest()->lockForUpdate()->first() : $q->where($conditions)->lockForUpdate()->first();
            } else {
                return $latest ? $q->where($conditions)->latest()->first() : $q->where($conditions)->first();
            }
        }

        return $q->find($conditions);
    }

    public function create($attributes = [], $multiple = false)
    {
        if ($multiple) {
            return $this->model->insert($attributes);
        }

        return $this->model->create($attributes);
    }

    public function update($conditions = [], $attributes = [])
    {
        return $this->model->where($conditions)->update($attributes);
    }

    public function delete($id = [])
    {
        if (is_array($id)) {
            return $this->model->whereIn('id', $id)->update(['status' => 0]);
        }

        return $this->model->where('id', $id)->update(['status' => 0]);
    }

    public function forceDelete($conditions = [])
    {
        return $this->model->where($conditions)->delete();
    }

    public function count($conditions = [], $field_count = '*')
    {
        return $this->model->where($conditions)->count($field_count);
    }

    public function sum($conditions = [], $field_count = '*')
    {
        return $this->model->where($conditions)->sum($field_count);
    }

    public function updateOrCreate($unique = [], $attributes = [], $isForce = false)
    {
        if ($isForce) {
            $checkExists = $this->model->where($unique)->first();
            if (!empty($checkExists)) {
                return $this->model->where($unique)->update($attributes);
            } else {
                return $this->model->create($attributes);
            }
        }

        return $this->model->updateOrCreate($unique, $attributes);
    }

    public function setConnection($connection)
    {
        $this->model->setConnection($connection);
    }

    public function decrement($conditions = [], $field, $number)
    {
        return $this->model->where($conditions)->decrement($field, $number);
    }
}
