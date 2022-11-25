<?php

use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\RoleController;
// use App\Http\Controllers\API\V1\Search\PhysicianSearchController;
// use App\Http\Controllers\API\V1\Search\SearchController;
use App\Http\Controllers\TestJoseController;
use Illuminate\Support\Facades\Route;

 /* RUTAS API VERSIÓN 1 */
global $physician, $admin;
// MÉDICO
$this->physician = "App\\Http\\Controllers\\API\\V1\\Physician\\";
// MÉDICO
$this->admin = "App\\Http\\Controllers\\API\\V1\\Admin\\";



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

        
        $v1 = "App\\Http\\Controllers\\API\\V1\\";
        // CATALOGOS
        $catalogues = "App\\Http\\Controllers\\API\\V1\\Catalogues\\";
        

  
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
        Route::resource('ocupations', $catalogues.OccupationController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
        //MEDICAL SERVICES
        Route::resource('medicalservice', $catalogues.MedicalServiceController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
        //INSURANCE
        Route::resource('insurance', $catalogues.InsuranceController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
        // ESPECIALIDADES
        Route::resource('/specialties', $catalogues.SpecialtyController::class)
        ->only(['index', 'store', 'show', 'update', 'destroy']);
            
        // SÓLO 2 TIPOS DE USUARIOS (MÉDICO O PACIENTE)
        // MÉDICO
        Route::controller($this->physician.PhysicianController::class)->group(function() {
            Route::get('/physician', 'show');
            Route::post('/physician', 'store');
            Route::put('/physician', 'update');
        });
        // INSTALACIONES DEL MÉDICO
        Route::prefix('physician')->group(function () {
            Route::controller($this->physician.FacilityController::class)->group(function() {
                Route::get('/facility', 'show');
                Route::post('/facility', 'store');
                Route::put('/facility', 'update');
            });
        });
        // PACIENTE
        Route::controller($v1.'Patient\\'.PatientController::class)->group(function() {
            Route::get('/patient', 'show');
            Route::post('/patient', 'store');
            Route::put('/patient', 'update');
        });


        // RUTAS ADMINISTRATIVAS
        Route::prefix('admin')->group(function () {
            // VERIFICAR EL MÉDICO
            Route::post('/checkphysician', [$this->admin.PhysicianController::class, 'check']);
        });
    
    });

    $search = "App\\Http\\Controllers\\API\\V1\\Search\\";
    /* BÚSQUEDAS */
    // BUSQUEDA MÉDICO MOBILE
    Route::get('/search', [$search.SearchController::class, 'index']);
    // BUSQUEDA DEFINIDA DE MÉDICO
    Route::get('/searchphy', [$search.PhysicianSearchController::class, 'index']);

});


// TESTS
// JOSÉ
    Route::get('/testjose', [TestJoseController::class, 'index']);
