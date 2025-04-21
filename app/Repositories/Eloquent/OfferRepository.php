<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Models\Offer;
use App\Repositories\Interfaces\IOffer;
use Illuminate\Support\Facades\DB;

class OfferRepository extends FloorRepository implements IOffer{
    private $categoryR;
    public function __construct(Offer $offer)
    {
        parent::__construct($offer);
        $this->categoryR = new CategoryRepository(new Category());
    }

    public function topThreeVoyagesByCategory($categ){
        $categoryO = $this->getFromTableByCulomn('categories', 'name', $categ);
        if(!count($categoryO)){
            $categ = "Morroco";
        }

        $offer_count = DB::select('
            SELECT offers.id, COUNT(domondes.offer_id) AS countDo
            FROM offers
            JOIN offer_category ON offers.id = offer_category.offer_id
            JOIN categories ON categories.id = offer_category.category_id
            JOIN domondes ON domondes.offer_id = offers.id
            WHERE categories.name = ?
            GROUP BY offers.id
            ORDER BY countDo DESC
            LIMIT 3
        ', [$categ]);
        foreach ($offer_count as $o_c) {
            $offers[] = $this->getById($o_c->id);
        }

        return $offers;
    }

    public function getFromTableByCulomn($table, $colum, $value){
        $resultat = DB::table($table)
        ->select($colum)
        ->where($colum, '=', $value)
        ->get();
        return $resultat;
    }
}