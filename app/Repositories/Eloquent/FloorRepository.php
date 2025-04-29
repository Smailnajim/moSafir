<?php

namespace App\Repositories\Eloquent;

use App\Repositories\Interfaces\IRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class FloorRepository implements IRepository{
    protected $model;

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
        return $this->model->find($id);
    }

    public function deleteAll()
    {
        return $this->model->truncate();
    }

    public function updatetById(int $id, array $data)
    {
        $model = $this->model->find($id);
        foreach ($data as $key => $value) {
            $model->$key = $value;
        }
        if($model)
        {
            $model->save();
            return true;
        }
        return false;
        
    }

    public function deletetById(int $id)
    {
        $model = $this->model->find($id);
        if($model)
        {
            $model->delete();
            return true;
        }
        return false;
    }

    public function getByCulomn(string $colum, $value)
    {
        return $this->model->where($colum, "=", $value)->first();
    }

    public function checkIdIfExiste(int $id)
    {
        $t = $this->model->find($id);
        if($t !== null)
            if($t->id == $id)
                return true;
        return false;
    }

    public function minId(){
        return $this->model->min('id');
    }

    public function maxId(){
        return $this->model->max('id');
    }

    public function updateCulomn(string $colum, $value, int $id){
        $t = $this->getById($id);
        $t->$colum = $value;
        $t->save();
    }
}