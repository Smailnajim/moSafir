<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Interfaces\IRepository;

class UserRepository extends FloorRepository implements IRepository {

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getByEmail(string $email){
        return $this->model->where('email', '=', $email)->first();
    }
}