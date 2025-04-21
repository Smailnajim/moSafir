<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Address::factory(10)->create();
        \App\Models\Domonde::factory(50)->create();
        \App\Models\Offer::factory(10)->create();
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class
        ]);
    }
}
