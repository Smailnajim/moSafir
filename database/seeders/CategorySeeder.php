<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Categories = [
            ['name' => 'Morroco'],
            ['name' => 'Wakend'],
        ];
        foreach($Categories as $Category){
            Category::create($Category);
        }
    }
}
