<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Models\Offer;
use App\Repositories\Interfaces\IOffer;

class OfferRepository extends FloorRepository implements IOffer{
    private $categoryR;
    public function __construct(Offer $offer)
    {
        parent::__construct($offer);
        $this->categoryR = new CategoryRepository(new Category());
    }
    public function topThreeVoyages($categ){
        $category = $this->categoryR->getByCulomn("name", $categ);
        $offers = $category->offers();
        
    }
}