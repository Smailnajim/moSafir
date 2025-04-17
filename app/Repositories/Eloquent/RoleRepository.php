<?php

namespace App\Repositories\Eloquent;

use App\Models\Role;
use App\Repositories\Interfaces\IRepository;
use App\Repositories\Interfaces\IRole;

class RoleRepository extends FloorRepository implements IRole{

    public function __construct(Role $role)
    {
        parent::__construct($role);
    }

    public function findByname($name){
        return $this->getByCulomn("name", $name);
    }


}