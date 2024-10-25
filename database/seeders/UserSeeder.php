<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'sistema',
            'email' => 'sistema@dinamo.com',
            'password' => bcrypt('10101010A'),
            'role_id' => 1,
        ]);
    }
}
