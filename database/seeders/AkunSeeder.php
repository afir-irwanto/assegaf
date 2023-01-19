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
        User::create([
            'name' => 'Administrator ASSEGAF',
            'email' => 'admin@assegaf.com',
            'password' => bcrypt('admin_assegaf')
        ]);
    }
}
