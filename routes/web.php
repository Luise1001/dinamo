<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Web\App\AuthController;
use App\Http\Controllers\Web\App\SettingController;
use App\Http\Controllers\Web\App\PermissionController;
use App\Http\Controllers\Web\App\RoleController;
use App\Http\Controllers\Web\App\ProfileController;
use App\Http\Controllers\Web\App\CurrencyController;
use App\Http\Controllers\Web\App\PlacesController;


Route::get('/', function () {

    if(auth()->check()){
        return redirect()->route('dashboard');
    }

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
         * Currencies
         */
        Route::get('/monedas', [CurrencyController::class, 'index'])->name('currencies');
        Route::post('/monedas', [CurrencyController::class, 'store'])->name('currencies.store');
        Route::put('/monedas', [CurrencyController::class, 'update'])->name('currencies.update');
        Route::get('/monedas/crear', [CurrencyController::class, 'create'])->name('currencies.create');
        Route::get('/monedas/editar={id}', [CurrencyController::class, 'edit'])->name('currencies.edit');

        /**
         * Places
         */
        Route::get('/destinos', [PlacesController::class, 'index'])->name('places');
        Route::post('/destinos', [PlacesController::class, 'store'])->name('places.store');
        Route::put('/destinos', [PlacesController::class, 'update'])->name('places.update');
        Route::get('/destinos/crear', [PlacesController::class, 'create'])->name('places.create');
        Route::get('/destinos/editar={id}', [PlacesController::class, 'edit'])->name('places.edit');

        /**
         * Dashboard
         */
        Route::get('/dashboard', function () {
            return view('app.index');
        })->name('dashboard');
    });

