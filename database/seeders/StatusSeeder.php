<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $status = [
            ['name' => 'Activ'],
            ['name' => 'Block'],
        ];
        foreach($status as $statu){
            Status::create($statu);
        }
    }
}