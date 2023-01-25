<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [[
            'name' => 'Administrator ASSEGAF',
            'email' => 'admin@assegaf.com',
            'password' => bcrypt('admin_assegaf'),
            'role' => 'admin'
        ],[
            'name' => 'User ASSEGAF',
            'email' => 'user@assegaf.com',
            'password' => bcrypt('user_assegaf'),
            'role' => 'user'
        ]];

        foreach($data as $dt){
            User::create($dt);
        };
    }
}
