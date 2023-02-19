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
            'name' => 'Md.Hasibur Rahman',
            'email' => 'admin@example.com',
            'password' => bcrypt('123456'),
            'usertype' => 'admin',
            'role' => 'admin'
        ]);
    }
}
