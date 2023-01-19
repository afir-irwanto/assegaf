<?php

namespace Database\Seeders;

use App\Models\TotalSkin;
use Illuminate\Database\Seeder;

class TotalSkinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TotalSkin::create([
            'total_skin' => 0
        ]);
    }
}
