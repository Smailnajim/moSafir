<?php

namespace App\Repositories\Eloquent;

use App\Models\Offer;
use App\Repositories\Interfaces\IOffer;

class OfferRepository extends FloorRepository implements IOffer{
    
    public function __construct(Offer $offer)
    {
        parent::__construct($offer);
    }
}