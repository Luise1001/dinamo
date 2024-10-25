<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RolePermission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dev = Role::where('name', 'developer')->first();

        Permission::create([
            'name' => 'permission.manage',
            'display_name' => 'Permisos',
            'description' => 'Gestión de permisos',
            'route' => 'permissions',
        ]);

        Permission::create([
            'name' => 'role.manage',
            'display_name' => 'Roles',
            'description' => 'Gestión de roles',
            'route' => 'roles',
        ]);

        Permission::create([
            'name' => 'setting.manage',
            'display_name' => 'Configuraciones',
            'description' => 'Gestión de configuraciones',
            'route' => 'settings',
            'hidden' => true,
        ]);

        $permissions = Permission::all();
        $dev->permissions()->attach($permissions);
    }
}
