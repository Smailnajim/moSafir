<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IAddress;
use App\Repositories\Interfaces\ICountry;
use Illuminate\Http\Request;

class AddressController extends Controller
{
    private ICountry $countryR;
    private IAddress $addressR;

    public function __construct(IAddress $addressR, ICountry $countryR)
    {
        $this->addressR = $addressR;
        $this->countryR = $countryR;
    }

    public function citiesByCountry(int $id){
        $country = $this->countryR->getById($id);
        if($country === null)
            return response()->json([]);

        $cities = $country->address->pluck('city')->toArray();
        return response()->json($cities);
    }
}
