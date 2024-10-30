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

        Permission::create([
            'name' => 'currencies.manage',
            'display_name' => 'Monedas',
            'description' => 'Gestión de monedas',
            'route' => 'dashboard',
            'hidden' => false,
        ]);

        Permission::create([
            'name' => 'destiny.manage',
            'display_name' => 'Destinos',
            'description' => 'Gestión de destinos',
            'route' => 'dashboard',
            'hidden' => false,
        ]);

        Permission::create([
            'name' => 'drivers.manage',
            'display_name' => 'Conductores',
            'description' => 'Gestión de conductores',
            'route' => 'dashboard',
            'hidden' => false,
        ]);

        Permission::create([
            'name' => 'users.manage',
            'display_name' => 'Usuarios',
            'description' => 'Gestión de usuarios',
            'route' => 'dashboard',
            'hidden' => false,
        ]);

        Permission::create([
            'name' => 'admin.manage',
            'display_name' => 'Administradores',
            'description' => 'Gestión de administradores',
            'route' => 'dashboard',
            'hidden' => false,
        ]);

        Permission::create([
            'name' => 'history.manage',
            'display_name' => 'Historial',
            'description' => 'Historial de transacciones',
            'route' => 'dashboard',
            'hidden' => false,
        ]);

        Permission::create([
            'name' => 'reports.manage',
            'display_name' => 'Reportes',
            'description' => 'Gestión de reportes',
            'route' => 'dashboard',
            'hidden' => false,
        ]);

        Permission::create([
            'name' => 'request.service',
            'display_name' => 'Solicitar servicio',
            'description' => '',
            'route' => 'dashboard',
            'hidden' => false,
        ]);


        $permissions = Permission::all();
        $dev->permissions()->attach($permissions);
    }
}
