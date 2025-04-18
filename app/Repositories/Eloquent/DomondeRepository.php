<?php

namespace App\Repositories\Eloquent;

use App\Models\Domonde;
use App\Repositories\Interfaces\IDomonde;

class DomondeRepository extends FloorRepository implements IDomonde{

    public function __construct(Domonde $domonde)
    {
        parent::__construct($domonde);
    }
}