<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginFormController;
use App\Http\Controllers\OwnerController;
use App\Http\Middleware\VerifyAuth;
use App\Http\Middleware\ConfirmDelete;

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


