<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $countries = [
            ['name' => 'morroco'],
            ['name' => 'algerie'],
            ['name' => 'spain'],
            ['name' => 'portugal'],
            ['name' => 'qatar'],
        ];

        foreach ($countries as $country) {
            Country::create($country);
        }
    }
}
