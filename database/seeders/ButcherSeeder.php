<?php

namespace Database\Seeders;

use App\Models\Butcher;
use Illuminate\Database\Seeder;

class ButcherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'name' => 'Yudit',
            'price' => 15000,
            'skin_grade' => 'lokal',
        ],[
            'name' => 'Gilang',
            'price' => 20000,
            'skin_grade' => 'afkir',
        ]];

        foreach($data as $dt){
            Butcher::create($dt);
        }
    }
}
