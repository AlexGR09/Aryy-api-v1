<?php

// use App\Http\Controllers\API\V1\AuthController;

use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\TestJoseController;
use Illuminate\Support\Facades\Route;

/* RUTAS API VERSIÓN 1 */

global $v1, $physician, $admin, $search, $catalogues, $patient;
// V1
$this->v1 = "App\\Http\\Controllers\\API\\V1\\";
// MÉDICO
$this->physician = "App\\Http\\Controllers\\API\\V1\\Physician\\";
// MÉDICO
$this->admin = "App\\Http\\Controllers\\API\\V1\\Admin\\";
// BÚSQUEDA
$this->search = "App\\Http\\Controllers\\API\\V1\\Search\\";
// CATALÓGOS
$this->catalogues = "App\\Http\\Controllers\\API\\V1\\Catalogues\\";
//PACIENTE
$this->patient = "App\\Http\\Controllers\\API\\V1\\Patient\\";



Route::prefix('v1')->group(function () {


    // RUTAS REGISTRO, LOGIN, PERFIL DE USUARIO
    Route::controller($this->v1 . AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
        Route::get('/logout', 'logout')->middleware(['auth:sanctum']);
        Route::prefix('user')->group(function () {
            Route::get('/profile', 'show')->middleware(['auth:sanctum']);
            Route::put('/profile', 'update')->middleware(['auth:sanctum']);
            Route::delete('/profile', 'destroy')->middleware(['auth:sanctum']);
        });
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {


        /* CATALÓGOS */
        Route::prefix('catalogue')->group(function () {
            // PAÍSES
            Route::resource('countries', $this->catalogues . CountryController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // ESTADOS
            Route::resource('states', $this->catalogues . StateController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // CIUDADES
            Route::resource('cities', $this->catalogues . CityController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            //OCUPACIONES
            Route::resource('ocupations', $this->catalogues . OccupationController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            //MEDICAL SERVICES
            Route::resource('medicalservice', $this->catalogues . MedicalServiceController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            //INSURANCE
            Route::resource('insurance', $this->catalogues . InsuranceController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // ESPECIALIDADES
            Route::resource('/specialties', $this->catalogues . SpecialtyController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
        });



        /* RUTAS DEL MÉDICO */
        Route::prefix('physician')->group(function () {
            // PERFIL DEL MÉDICO
            Route::controller($this->physician . PhysicianController::class)->group(function () {
                Route::get('/profile', 'show');
                Route::post('/profile', 'store');
                Route::put('/profile', 'update');
            });
            // INSTALACIONES DEL MÉDICO
            Route::controller($this->physician . FacilityController::class)->group(function () {
                Route::get('/facility', 'show');
                Route::post('/facility', 'store');
                Route::put('/facility', 'update');
            });
        });

        /* RUTAS DEL PACIENTE */
        Route::prefix('patient')->group(function () {
            // PACIENTE
            Route::controller($this->patient . PatientController::class)->group(function () {
                Route::get('/profile', 'show');
                Route::post('/profile', 'store');
                Route::put('/profile', 'update');
            });
            /* Historial medico del paciente */
            //Datos basicos
            Route::controller($this->patient . BasicImformationController::class)->group(function () {
                Route::get('/basic-information', 'show');
                Route::post('/basic-information', 'store');
                Route::put('/basic-information', 'update');
            });
            //Antecedentes patologicos
            Route::controller($this->patient . PathologicalBackgroudController::class)->group(function () {
                Route::post('/pathological_backgroud', 'store');
                Route::get('/pathological_backgroud', 'show');
                Route::put('/pathological_backgroud', 'update');
            });
            //Antecedentes no patologicos
            Route::controller($this->patient.NonPathologicalBackgroundController::class)->group(function(){
                Route::post('/non_pathological_backgroud', 'store');
                Route::get('/non_pathological_backgroud', 'show');
                Route::put('/non_pathological_backgroud', 'update');
            });
        });



        /* RUTAS ADMINISTRATIVAS */
        Route::prefix('admin')->group(function () {
            // VERIFICAR EL MÉDICO
            Route::post('/checkphysician', [$this->admin . PhysicianController::class, 'check']);
            // ROLES (FALTA MOVER A CARPETA ADMIN)
            Route::resource('roles', RoleController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // PERMISOS (FALTA MOVER A CARPETA ADMIN)
            Route::resource('permissions', PermissionController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
        });
    });


    /* BÚSQUEDAS */
    // BUSQUEDA MÉDICO MOBILE
    Route::get('/search', [$this->search . SearchController::class, 'index']);
    // BUSQUEDA DEFINIDA DE MÉDICO
    Route::get('/searchphy', [$this->search . PhysicianSearchController::class, 'index']);
});


/* TESTS */
// JOSÉ
Route::get('/testjose', [TestJoseController::class, 'index']);
