<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Idola Hoffman',
            'username' => 'admin',
            'email' => 'idola@mailinator.com',
            'password' => '$2y$10$RVRgNTL0k/0gq2PkisK96..2/hGNvRL4G0vQl2odeob30Bkov0Cbq',
        ]);
    }
}
