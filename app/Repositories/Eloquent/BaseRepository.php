<?php

namespace App\Repositories\Eloquent;

use App\Repositories\IRepository;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Pagination\Paginator;

class BaseRepository implements IRepository
{
    /**
     * @var Illuminate\Database\Eloquent\Model
     */
    protected Model $model;

    /**
     * @param Illuminate\Database\Eloquent\Model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * Return all records in table with pagination.
     *
     * @param integer $page
     * @param integer $perPage
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function all(int $page = 0, int $perPage = 15): Paginator
    {
        return $this->model->simplePaginate($perPage, ["*"], "page", $page);
    }

    /**
     * Return unique record based id.
     *
     * @param integer $id
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function find(int $id): Model
    {
        return $this->model->find($id);
    }

    /**
     * Create a new user.
     *
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data): Model
    {
        return $this->model->create($data);
    }
}
