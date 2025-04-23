<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Models\Offer;
use App\Repositories\Interfaces\IOffer;
use Illuminate\Support\Facades\DB;

class OfferRepository extends FloorRepository implements IOffer{
    public function __construct(Offer $offer)
    {
        parent::__construct($offer);

    }

    public function topThreeVoyagesByCategory(string $categ){
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

    public function searchByname(string $name){
        return $this->getByCulomn("name", $name);
    }

    public function searchByCategory(array $categories){
        // $st = '"' . $categories[0] . '"';
        // foreach ($categories as $key => $value) {
        //     $st .= ', "' . $value . '"';
        // }
        // $of = DB::select('
        //     select offers.id FROM offers
        //     Join offer_category on offer_category.offer_id = offers.id
        //     Join categories on offer_category.category_id = categories.id
        //     WHERE categories.name IN (?)
        //     GROUP BY offers.id
        //     having count(DISTINCT categories.name) = ?
        // ', [$st, count($categories)]);

        $offers = $this->model::whereHas('categories', function ($query) use ($categories) {
            $query->whereIn('name', $categories);
        })
        ->withCount(['categories as matched_categories_count' => function ($query) use ($categories) {
            $query->whereIn('name', $categories);
        }])
        ->having('matched_categories_count', '=', count($categories))
        ->get();        
        
        
        return $offers;
    }


    public function allCategories(){
        return Category::all("name");
    }

    public function checkCategoryIfExiste(string $category){
        $t = Category::where("name", $category)->get();
        if($t[0]->name == $category)
        return true;
    }
}