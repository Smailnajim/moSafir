<?php

namespace App\Repositories\Eloquent;

use App\Models\Country;
use App\Repositories\Interfaces\ICountry;

class CountryRepository extends FloorRepository implements ICountry{


    public function __construct(Country $country)
    {
        $this->model = $country;
    }
}