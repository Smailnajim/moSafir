<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IOffer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    private $offerRep;

    public function __construct(IOffer $offerR)
    {
        $this->offerRep = $offerR;
    }
}
