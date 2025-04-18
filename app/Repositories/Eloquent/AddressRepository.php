<?php

namespace App\Repositories\Eloquent;

use App\Models\Address;
use App\Repositories\Interfaces\IAddress;

class AddressRepository extends FloorRepository implements IAddress{

    public function __construct(Address $addres)
    {
        parent::__construct($addres);
    }
}