<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'developer',
            'display_name' => 'Desarrollador',
            'description' => 'Administrador',
            'user_id' => 1
        ]);

        Role::create([
            'name' => 'admin',
            'display_name' => 'Administrador',
            'description' => 'Administrador de sistema',
            'user_id' => 1
        ]);

        Role::create([
            'name' => 'driver',
            'display_name' => 'Conductor',
            'description' => 'Conductor de vehículo',
            'user_id' => 1
        ]);

        Role::create([
            'name' => 'user',
            'display_name' => 'Usuario',
            'description' => 'Usuario regular',
            'user_id' => 1
        ]);

    }
}
