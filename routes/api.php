<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\Search\PhysicianSearchController;
use Illuminate\Support\Facades\Route;


Route::prefix('v1')->group(function () {

    // RUTAS REGISTRO, LOGIN, PERFIL DE USUARIO
    Route::controller(AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
        Route::get('/profile', 'show')->middleware(['auth:sanctum']);
        Route::put('/profile', 'update')->middleware(['auth:sanctum']);
        Route::delete('/profile', 'destroy')->middleware(['auth:sanctum']);
        Route::get('/logout', 'logout')->middleware(['auth:sanctum']);
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {

        // RUTA API VERSIÓN 1
        $v1 = "App\\Http\\Controllers\\API\\V1\\";
        // CATALOGOS
        $catalogues = "App\\Http\\Controllers\\API\\V1\\Catalogues\\";

        // SÓLO ADMIN
        // ROLES
        Route::resource('roles', RoleController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
        // PERMISOS
        Route::resource('permissions', PermissionController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
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
            
        // SÓLO 2 TIPOS DE USUARIOS (MÉDICO O PACIENTE)
        // MÉDICO
        Route::controller($v1.'Physician\\'.PhysicianController::class)->group(function() {
            Route::get('/physician', 'show');
            Route::post('/physician', 'store');
            Route::put('/physician', 'update');
        });
        // PACIENTE
        Route::controller($v1.'Patient\\'.PatientController::class)->group(function() {
            Route::get('/patient', 'show');
            Route::post('/patient', 'store');
            Route::put('/patient', 'update');
        });


        
        // Route::get('/user', [UserController::class, 'index']);
    
    });


// BÚSQUEDAS
    // DEL PACIENTE
    Route::get('/searchphy', [PhysicianSearchController::class, 'index']);

});

Route::resource('prueba',PruebaEncryp::class)->only(['index']);