<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Roles;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        User::truncate();
        Roles::truncate();

        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'role_id' => 1,
            'role' => 'Admin',
            'email' => 'idola@mailinator.com',
            'password' => '$2y$10$A6tpVXwbDfXDPGq62wG3BOof7xkPhOeiXlI11cjckCqSGFJznLfnq',
            'remember_token' => 'NRgSnCUxKfc68WukdBWlDG7qv75uSP6cZhgn56HuTR4rCJzIBDHMhVhlDcu0',
            'status' => 'Y',
            'created_by' => 0,
            'updated_by' => 0,
            'created_at' => '2000-01-01 00:00:01',
            'updated_at' => '2000-01-01 00:00:01'
        ]);

        Roles::create([
            'name' => 'Admin',
            'status' => 'N',
            'created_at' => '2000-01-01 00:00:01',
            'updated_at' => '2000-01-01 00:00:01'
        ]);

        Roles::create([
            'name' => 'PD',
            'status' => 'Y',
            'created_at' => '2000-01-01 00:00:01',
            'updated_at' => '2000-01-01 00:00:01'
        ]);
    }
}
