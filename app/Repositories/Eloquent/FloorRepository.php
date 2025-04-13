<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\IRepository;
use Illuminate\Database\Eloquent\Model;

class FloorRepository implements IRepository{
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function all()
    {
        return $this->model->all();
    }

    public function getById(int $id)
    {
        return $this->model->finde($id);
    }

    public function deleteAll()
    {
    }

    public function updatetById(int $id, array $data)
    {
    }

    public function deletetById(int $id)
    {
    }

}