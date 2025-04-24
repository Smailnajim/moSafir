<?php 

namespace App\Repositories\Interfaces;

interface IUser extends IRepository{
    public function getByEmail(string $email);
}


