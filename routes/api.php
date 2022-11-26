<?php

// use App\Http\Controllers\API\V1\AuthController;
use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\TestJoseController;
use Illuminate\Support\Facades\Route;

 /* RUTAS API VERSIÓN 1 */
global $v1, $physician, $admin, $search, $catalogues;
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



Route::prefix('v1')->group(function () {


    // RUTAS REGISTRO, LOGIN, PERFIL DE USUARIO
    Route::controller($this->v1.AuthController::class)->group(function () {
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
            Route::resource('countries', $this->catalogues.CountryController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
            // ESTADOS
            Route::resource('/states', $this->catalogues.StateController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // CIUDADES
            Route::controller($this->catalogues.CityController::class)->group(function() {
                Route::get('/cities', 'index');
                Route::get('/citiesofstate', 'citiesofState');
                Route::get('/cities/{city}', 'show');
                Route::post('/cities', 'store');
                Route::put('/cities/{city}', 'update');
                Route::delete('/cities/{city}', 'destroy');
            });
            //OCUPACIONES
            Route::resource('ocupations', $this->catalogues.OccupationController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            //MEDICAL SERVICES
            Route::resource('medicalservice', $this->catalogues.MedicalServiceController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            //INSURANCE
            Route::resource('insurance', $this->catalogues.InsuranceController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // ESPECIALIDADES
            Route::resource('/specialties', $this->catalogues.SpecialtyController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
        });
        
            

        /* RUTAS DEL MÉDICO */
        Route::prefix('physician')->group(function () {
            // PERFIL DEL MÉDICO
            Route::controller($this->physician.PhysicianController::class)->group(function() {
                Route::get('/profile', 'show');
                Route::post('/profile', 'store');
                Route::put('/profile', 'update');
            });
            // INSTALACIONES DEL MÉDICO
            Route::controller($this->physician.FacilityController::class)->group(function() {
                Route::get('/facility', 'show');
                Route::post('/facility', 'store');
                Route::put('/facility', 'update');
            });
        });

        // PACIENTE
        Route::controller($this->v1.'Patient\\'.PatientController::class)->group(function() {
            Route::get('/patient', 'show');
            Route::post('/patient', 'store');
            Route::put('/patient', 'update');
        });


        /* RUTAS ADMINISTRATIVAS */
        Route::prefix('admin')->group(function () {
            //  MÉDICOS
            Route::controller($this->admin.PhysicianController::class)->group(function() {
                Route::post('/checkphysician', 'check');
            });
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
    Route::get('/search', [$this->search.SearchController::class, 'index']);
    // BUSQUEDA DEFINIDA DE MÉDICO
    Route::get('/searchphy', [$this->search.PhysicianSearchController::class, 'index']);

});


/* TESTS */
    // JOSÉ
    Route::get('/testjose', [TestJoseController::class, 'index']);
