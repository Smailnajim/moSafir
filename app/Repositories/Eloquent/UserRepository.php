<?php

namespace App\Repositories\Eloquent;

use App\Models\Profile;
use App\Models\Reaction;
use App\Models\User;
use App\Repositories\Interfaces\IRepository;
use App\Repositories\Interfaces\IUser;

class UserRepository extends FloorRepository implements IUser {

    public function __construct(User $user)
    {
        parent::__construct($user);
    }

    public function getByEmail(string $email){
        return $this->model->where('email', '=', $email)->first();
    }

    public function registerUser(array $data, string $name)
    {
        $user = $this->create($data);
        Profile::create([
            'name' => $name,
            'user_id' => $user->id
        ]);
        return $user;
    }
}