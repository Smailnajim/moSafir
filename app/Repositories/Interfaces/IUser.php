<?php 

namespace App\Repositories\Interfaces;

interface IUser{
    public function getByEmail(string $email);
}


