<?php

namespace App\Http\Controllers;

use App\DTOs\OfferDto;
use App\Http\Requests\OfferFormRequest;
use App\Repositories\Interfaces\IAddress;
use App\Repositories\Interfaces\ICountry;
use App\Repositories\Interfaces\IOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    private IOffer $offerRep;
    private IAddress $addressR;

    public function __construct(IOffer $offerR, IAddress $addressR, ICountry $countryR)
    {
        $this->offerRep = $offerR;
        $this->addressR = $addressR;
    }

    public function topThreeVoyages(string $category){
        $category = strtolower($category);
        $category[0] = strtoupper($category[0]);
        $offers = $this->offerRep->topThreeVoyagesByCategory($category);
        return $offers;
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
        $categories = $this->offerRep->allCategories();
        $voyages[] = $this->offerRep->getByCulomn('title', $request->searchByname);
        return view('clinet.offers', compact('voyages', 'categories'));
    }

    public function searchByCategories(OfferFormRequest $request){
        if($request->has('all')){
            return redirect()->route('offers');
        }
        if($request->has('searchByname')){
            return $this->filter($request);
        }
        $categories = [];
        for ($i=0; $i < $request->index; $i++) { 
            $category = "category".($i);
            if($request->$category){
                if($this->offerRep->checkCategoryIfExiste($request->$category)){
                    $categories[] = $request->$category;
                }
            }
        }
        $voyages = $this->offerRep->searchByCategory($categories);
        $categories = $this->offerRep->allCategories();
        return view('clinet.offers', compact('voyages', 'categories'));

    }


    public function offersAdmin(){
        $voyages = $this->offerRep->all();
        return view('admin.offers', compact('voyages'));
    }
    public function singleOffer(int $id){
        $offerM = $this->offerRep->getById($id);
        $addres = $offerM->address;
        $country = $addres->country;
        $offer = OfferDto::createPostDto($offerM->image, $offerM->id, $offerM->title, $offerM->price, $offerM->stars, $addres->city .', '. $country->name, $offerM->description);
        return view('admin.updateOffer', compact('offer'));
    }

    public function updateOffer(Request $request){
        $data = [];
        $data['title'] = $request->title;
        $data['description'] = $request->description;
        $data['price'] = $request->price;

        $this->offerRep->updatetById($request->id, $data);
        return back();
    }

    public function deleteOffer(int $id){
        $this->offerRep->deletetById($id);
        return redirect()->route('adminoffers');
    }
}
