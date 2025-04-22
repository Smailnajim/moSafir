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

    public function topThreeVoyages(string $category){
        $category = strtolower($category);
        $category[0] = strtoupper($category[0]);
        $offers = $this->offerRep->topThreeVoyagesByCategory($category);
        return $offers ;
    }

    public function home(string $category){
        $Voyages  = $this->topThreeVoyages($category);
        // foreach ($Voyages as $Voyage) {
        //     dd($Voyage->stars);
        // }
        return view('clinet.index', compact('Voyages'));
    }

    public function offers(){
        $Voyages = $this->offerRep->all();
        return view('clinet.offers', compact('Voyages'));
    }
}
