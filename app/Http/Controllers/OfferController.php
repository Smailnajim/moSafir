<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferFormRequest;
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
        return view('clinet.index', compact('Voyages'));
    }

    public function offers(){
        $voyages = $this->offerRep->all();
        $categories = $this->offerRep->allCategories();
        return view('clinet.offers', compact('voyages', 'categories'));
    }


    public function filter(OfferFormRequest $request){
        
        if($request->has('searchByname'))
        $offers = $this->searchByname($request->searchByname);
    }

    public function searchByname(string $name){
        return $this->offerRep->getByCulomn('name', $name);
    }

    public function searchByCategories(OfferFormRequest $request){
        $i = 0;
        $categories = [];
        $category = "category0";
        dd($request);
        while($request->$category){
            if($this->offerRep->checkCategoryIfExiste($request->$category)){
                $categories[] = $request->$category;
            }
            $category = "category".(++$i);
        }
        
        $voyages = $this->offerRep->searchByCategory($categories);
        $categories = $this->offerRep->allCategories();
        // return back()->with("voyages", $voyages);
        // return redirect()->back()->withInput(['voyages' => $voyages]);
        return view('clinet.offers', compact('voyages', 'categories'));

    }
}
