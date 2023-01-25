<?php

namespace Database\Seeders;

use App\Models\TotalMeat;
use Illuminate\Database\Seeder;

class TotalMeatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TotalMeat::create([
            'total_meat' => 0
        ]);
    }
}
