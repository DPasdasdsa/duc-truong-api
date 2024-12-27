<?php

namespace Modules\Admin\Repositories;

interface RepositoryInterface
{
    /**
     * Get all
     * @return mixed
     */
    public function getAll();

    /**
     * Find.
     *
     * @param $id
     * @param $select
     * @return mixed
     */
    public function find($id, $select = null);

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = []);

    /**
     * Update
     * @param $id
     * @param array $attributes
     * @return mixed
     */
    public function update($id, array $attributes = []);

    /**
     * Delete.
     *
     * @param int $id
     * @return mixed
     */
    public function delete(int $id);

    /**
     * Update or create.
     *
     * @param array $condition
     * @param array $attributes
     * @return mixed
     */
    public function updateOrCreate(array $condition, array $attributes = []);
}
