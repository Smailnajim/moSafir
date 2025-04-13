<?php

namespace App\Repositories\Eloquent;

use App\Models\Role;
use App\Repositories\Interfaces\IRepository;

class RoleRepository extends FloorRepository implements IRepository{

    public function __construct(Role $role)
    {
        parent::__construct($role);
    }
}