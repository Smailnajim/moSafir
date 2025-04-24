<?php

namespace App\Repositories\Interfaces;

interface IRole extends IRepository{
    public function findByname($name);

}