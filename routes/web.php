<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\App\AuthController;
use App\Http\Controllers\Web\App\SettingController;
use App\Http\Controllers\Web\App\PermissionController;
use App\Http\Controllers\Web\App\RoleController;
use App\Http\Controllers\Web\App\ProfileController;


Route::get('/', function () {
    return view('index');
});


Route::get('/continuar-con-google', [AuthController::class, 'index'])->name('google.login');
Route::get('/continuar-con-google/redirect', [AuthController::class, 'login']);


Route::middleware(['auth:sanctum', config('jetstream.auth_session'),'verified'])
    ->group(function () {

        /**
         * Settings 
         */
        Route::get('/configuraciones', [SettingController::class, 'index'])->name('settings');

        /**
         * Permissions
         */
        Route::get('/permisos', [PermissionController::class, 'index'])->name('permissions');
        Route::post('/permisos', [PermissionController::class, 'store'])->name('permissions.store');
        Route::put('/permisos', [PermissionController::class, 'update'])->name('permissions.update');
        Route::get('/permisos/crear', [PermissionController::class, 'create'])->name('permissions.create');
        Route::get('/permisos/editar/permiso={id}', [PermissionController::class, 'edit'])->name('permissions.edit');

        /**
         * Roles
         */
        Route::get('/roles', [RoleController::class, 'index'])->name('roles');
        Route::post('/roles', [RoleController::class, 'store'])->name('roles.store');
        Route::put('/roles', [RoleController::class, 'update'])->name('roles.update');
        Route::get('/roles/crear', [RoleController::class, 'create'])->name('roles.create');
        Route::get('/roles/editar/rol={id}', [RoleController::class, 'edit'])->name('roles.edit');

        /**
         * Profile
         */
        Route::get('/perfil', [ProfileController::class, 'index'])->name('profile');
        Route::get('/perfil/informacion', [ProfileController::class, 'info'])->name('profile.info');
        Route::get('/perfil/cambio-clave', [ProfileController::class, 'password'])->name('profile.password');
        Route::get('/perfil/seguridad', [ProfileController::class, 'security'])->name('profile.security');
        Route::get('/perfil/sesiones', [ProfileController::class, 'sessions'])->name('profile.sessions');
        Route::get('/perfil/eliminar-cuenta', [ProfileController::class, 'deleteAccount'])->name('profile.deleteAccount');
        


        /**
         * Dashboard
         */
        Route::get('/dashboard', function () {
            return view('app.index');
        })->name('dashboard');
    });

