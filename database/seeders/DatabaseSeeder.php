<?php

namespace Database\Seeders;

use App\Models\Reaction;
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
        \App\Models\Offer::factory(40)->create();
        $this->call([
            RoleSeeder::class,
            CategorySeeder::class,
            StatusSeeder::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class,
            Offer_Category::class
        ]);
        \App\Models\Post::factory(23)->create();
        \App\Models\Reaction::factory(10)->create();
    }
}
