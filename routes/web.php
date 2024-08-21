<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginFormController;
use App\Http\Controllers\OwnerController;
use App\Http\Middleware\VerifyAuth;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\GuarantorController;
use App\Http\Controllers\PropertyController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/iniciar-sesion', [LoginFormController::class, 'index'])
    ->name('auth.loginForm');
Route::post('/iniciar-sesion', [LoginFormController::class, 'processLoginForm'])
    ->name('auth.processLoginForm');
Route::post('/cerrar-sesion', [LoginFormController::class, 'processLogout'])
    ->name('auth.processLogout')
    ->middleware(VerifyAuth::class);

Route::get('/propietarios', [OwnerController::class, 'index'])
    ->name('owners.index')
    ->middleware(VerifyAuth::class);
Route::get('/propietarios/crear', [OwnerController::class, 'create'])
    ->name('owners.createForm')
    ->middleware(VerifyAuth::class);
Route::post('/propietarios/crear', [OwnerController::class, 'processCreate'])
    ->name('owners.processCreate')
    ->middleware(VerifyAuth::class);
Route::get('/propietarios/{id}/editar', [OwnerController::class, 'edit'])
    ->name('owners.editForm')
    ->middleware(VerifyAuth::class);
Route::post('/propietarios/{id}/editar', [OwnerController::class, 'processUpdate'])
    ->name('owners.processUpdate')
    ->middleware(VerifyAuth::class);
Route::get('/propietarios/{id}/eliminar', [OwnerController::class, 'delete'])
    ->name('owners.deleteForm')
    ->middleware(VerifyAuth::class);
Route::get('/propietarios/{id}/confirmar-eliminacion', [OwnerController::class, 'delete'])
    ->name('owners.confirmDelete')
    ->middleware(VerifyAuth::class);
Route::post('/propietarios/{id}/eliminar', [OwnerController::class, 'confirmDelete'])
    ->name('owners.processDelete')
    ->middleware(VerifyAuth::class);

Route::get('/inquilinos', [TenantController::class, 'index'])
    ->name('tenants.index')
    ->middleware(VerifyAuth::class);
Route::get('/inquilinos/crear', [TenantController::class, 'create'])
    ->name('tenants.createForm')
    ->middleware(VerifyAuth::class);
Route::post('/inquilinos/crear', [TenantController::class, 'processCreate'])
    ->name('tenants.processCreate')
    ->middleware(VerifyAuth::class);
Route::get('/inquilinos/{id}/editar', [TenantController::class, 'edit'])
    ->name('tenants.editForm')
    ->middleware(VerifyAuth::class);
Route::post('/inquilinos/{id}/editar', [TenantController::class, 'processUpdate'])
    ->name('tenants.processUpdate')
    ->middleware(VerifyAuth::class);
Route::get('/inquilinos/{id}/eliminar', [TenantController::class, 'delete'])
    ->name('tenants.deleteForm')
    ->middleware(VerifyAuth::class);

Route::get('propiedades', [PropertyController::class, 'index'])
    ->name('properties.index')
    ->middleware(VerifyAuth::class);


