<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Offer_Category extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $o = DB::table('offers')->inRandomOrder()->limit(1)->get();
        $c = DB::table('categories')->inRandomOrder()->limit(1)->get();

        DB::table('offer_category')->insert([
            'offer_id' => $o[0]->id,
            'category_id' => $c[0]->id 
        ]);
    }
}
