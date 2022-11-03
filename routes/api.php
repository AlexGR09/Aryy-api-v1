<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EncrypController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Physician\PhysicianController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PruebaEncryp;


// CREAR RUTAS SÓLO PARA ADMINISTRADOR

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

    // CATALOGOS
    $catalogues = "App\\Http\\Controllers\\Catalogues\\";
    $patient = "App\\Http\\Controllers\\Patient\\";

    // PAISES
    Route::resource('countries', $catalogues.CountryController::class)
        ->only(['index', 'store', 'show', 'update', 'destroy']);
    // ESTADOS
    Route::resource('states', $catalogues.StateController::class)
        ->only(['index', 'store', 'show', 'update', 'destroy']);
    // CIUDADES
    Route::resource('cities', $catalogues.CityController::class)
        ->only(['index', 'store', 'show', 'update', 'destroy']);
    //OCUPACIONES
    Route::resource('ocupations', $catalogues.OcupationController::class)
        ->only(['index', 'store', 'show', 'update', 'destroy']);
    //MEDICAL SERVICES
    Route::resource('medicalservice', $catalogues.MedicalServiceController::class)
        ->only(['index', 'store', 'show', 'update', 'destroy']);
    //INSURANCE
    Route::resource('insurance', $catalogues.InsuranceController::class)
        ->only(['index', 'store', 'show', 'update', 'destroy']);
    //PATIENT
    Route::resource('patient', $patient.PatientContoller::class)
        ->only(['index','store','show']);

    // PHYSICIAN
    // Route::resource('physicians', PhysicianController::class)
    //     ->only(['index', 'store', 'show', 'update', 'destroy']);

    // PHYSICIAN
    Route::controller(PhysicianController::class)->group(function() {
        Route::get('/physician', 'show');
        Route::post('/physician', 'store');
    });


});

