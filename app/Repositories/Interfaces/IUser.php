<?php 

namespace App\Repositories\Interfaces;

interface IUser extends IRepository{
    public function getByEmail(string $email);
    public function registerUser(array $data, string $name);
}


