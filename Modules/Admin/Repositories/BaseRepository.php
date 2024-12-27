<?php

namespace Modules\Admin\Repositories;

use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * Base repository.
 */
abstract class BaseRepository implements RepositoryInterface
{
    /**
     * @var $model
     */
    protected $model;

    /**
     * Set model.
     * @throws BindingResolutionException
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Model.
     *
     * @return mixed
     */

    abstract public function model();

    /**
     * Set model.
     *
     * @return void
     * @throws BindingResolutionException
     */
    public function setModel()
    {
        $this->model = app()->make(
            $this->model()
        );
    }

    /**
     * Get all.
     *
     * @return mixed
     */
    public function getAll($select = null)
    {
        return $select ? $this->model->select($select)->get() : $this->model->all();
    }

    /**
     * Find.
     *
     * @param $id
     * @param $select
     * @return mixed
     */
    public function find($id, $select = null)
    {
        return $select ? $this->model->select($select)->find($id) : $this->model->find($id);
    }

    /**
     * Create.
     *
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = [])
    {
        return $this->model->create($attributes);
    }

    /**
     * insert.
     *
     * @param array $attributes
     * @return mixed
     */
    public function insert(array $attributes = [])
    {
        return $this->model->insert($attributes);
    }

    /**
     * Update.
     *
     * @param $id
     * @param array $attributes
     * @return false|mixed
     */
    public function update($id, array $attributes = [])
    {
        $result = $this->find($id);
        if ($result) {
            $result->update($attributes);
            return $result;
        }

        return false;
    }

    /**
     * Update.
     *
     * @param array $condition
     * @param array $attributes
     * @return false|mixed
     */
    public function updateOrCreate(array $condition, array $attributes = [])
    {
        return $this->model->updateOrCreate($condition, $attributes);
    }

    /**
     * Delete.
     *
     * @param $id
     * @return bool
     */
    public function delete($id): bool
    {
        $result = $this->find($id);
        if ($result) {
            $result->delete();
            return true;
        }

        return false;
    }
}
