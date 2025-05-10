<?php

namespace Database\Seeders;

use App\Models\Profile;
use App\Models\Reaction;
use Illuminate\Database\Seeder;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::factory(50)->create();
        \App\Models\Domonde::factory(50)->create();
        \App\Models\Offer::factory(40)->create();

        foreach ($users as $user) {
            $profile = Profile::create([
                'name' => $user->first_name . $user->last_name,
                'user_id' => $user->id
            ]);
            DB::table('user_profile_table_pivo')->insert([
                'user_id' => $user->id,
                'profile_id' => 1
            ]);
        }
        
        $this->call([
            CountrySeeder::class,
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
        \App\Models\Address::factory(10)->create();
        \App\Models\Post::factory(23)->create();
        \App\Models\Reaction::factory(10)->create();
    }
}
