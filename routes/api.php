<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\RoleController;

Route::controller(AuthController::class)->group(function () {
    Route::post('/login', 'login');
    Route::post('/register', 'register');
    Route::get('/profile', 'show')->middleware(['auth:sanctum']);
    Route::put('/profile', 'update')->middleware(['auth:sanctum']);
    Route::delete('/profile', 'destroy')->middleware(['auth:sanctum']);
    Route::get('/logout', 'logout')->middleware(['auth:sanctum']);
});

Route::group(['middleware' => ['auth:sanctum']], function () {

    // ROLES
    Route::resource('roles', RoleController::class)
        ->only(['index', 'store', 'show', 'update', 'destroy']);

    // PERMISOS
    Route::resource('permissions', PermissionController::class)
        ->only(['index', 'store', 'show', 'update', 'destroy']);
});