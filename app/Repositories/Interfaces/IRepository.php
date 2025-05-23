<?php

namespace App\Repositories\Interfaces;

interface IRepository{

    public function create(array $data);
    public function all();
    public function getById(int $id);
    public function updatetById(int $id, array $data);
    public function deleteAll();
    public function deletetById(int $id);
    public function getByCulomn(string $colum, $value);
    public function checkIdIfExiste(int $id);
    public function minId();
    public function maxId();
    public function updateCulomn(string $colum, $value, int $id);
    public function deletetGroupById(array $ids);
    public function pagination();
}