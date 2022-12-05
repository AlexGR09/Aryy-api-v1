<?php

use App\Http\Controllers\API\V1\ConsultingRoomController;
use App\Http\Controllers\API\V1\FacilityController;
use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\ScheduleFacilityController;
// use App\Http\Controllers\API\V1\Search\PhysicianSearchController;
// use App\Http\Controllers\API\V1\Search\SearchController;
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
            Route::resource('/states', $this->catalogues . StateController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // CIUDADES
            Route::controller($this->catalogues . CityController::class)->group(function () {
                Route::get('/cities', 'index');
                Route::get('/citiesofstate', 'citiesOfState');
                Route::get('/cities/{city}', 'show');
                Route::post('/cities', 'store');
                Route::put('/cities/{city}', 'update');
                Route::delete('/cities/{city}', 'destroy');
            });
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
            // SUB ESPECIALIDADES
            Route::controller($this->catalogues . SubSpecialtyController::class)->group(function () {
                Route::get('/subspecialties', 'index');
                Route::get('/subspecialtiesofspecialty', 'subSpecialtiesOfSpecialty');
            });
        });



        /* RUTAS DEL MÉDICO */
        Route::prefix('physician')->group(function () {
            // PERFIL DEL MÉDICO
            Route::controller($this->physician . PhysicianController::class)->group(function () {
                Route::get('/profile', 'show');
                Route::post('/profile', 'store');
                Route::put('/profile', 'update');
            });
            // ARCHIVOS DE FORMACIÓN DEL MÉDICO
            Route::controller($this->physician . EducationalBackgroundController::class)->group(function () {
                Route::post('/educationalbackground/uploadlicense', 'uploadLicense');
                Route::post('/educationalbackground/uploadcertificate', 'uploadCertificate');
                Route::delete('/educationalbackground/deletecertificate', 'deleteCertificate');
                Route::get('/educationalbackground/getimage', 'getImage');
            });
            // ARCHIVOS DE IDENTIDAD MÉDICA
            Route::controller($this->physician . MedicalIdentityController::class)->group(function () {
                Route::get('/medicalindentity', 'index');
                Route::post('/medicalindentity/uploadlogo', 'uploadLogo');
                Route::post('/medicalindentity/uploadphysicianphoto', 'uploadPhysicianPhoto');
                Route::post('/medicalindentity/uploadfacilityphoto', 'uploadFacilityPhoto');
                Route::delete('/medicalindentity/deleteimage', 'deleteImage');

                Route::get('/medicalindentity/getimage', 'getImage');
            });
           
            // INSTALACIONES DEL MÉDICO
            // Route::controller($this->physician.FacilityController::class)->group(function() {
            //     Route::get('/facility', 'index');
            //     Route::get('/facility/{id}', 'show');
            //     Route::post('/facility', 'store');
            //     Route::put('/facility/{id}', 'update');
            //     Route::delete('/facility/{id}', 'destroy');
            // });
        });

        /* RUTAS DEL PACIENTE */
        Route::prefix('patient')->group(function () {
            // PACIENTE
            //Perfil de paciente - Informacion basica del perfil
            Route::controller($this->patient . PatientController::class)->group(function () {
                Route::get('/profile/basic_information', 'show');
                Route::post('/profile/basic_information', 'store');
                Route::put('/profile/basic_information', 'update');
            });
            //Perfil del paciente - Seguros de gastos medicos
            Route::controller($this->patient . HealthInsuranceController::class)->group(function () {
                Route::post('/profile/health_insurance_data', 'store');
                Route::get('/profile/health_insurance_data', 'show');
                Route::put('/profile/health_insurance_data', 'update');
            });

            //Perfil del paciente - Ubicacion(es)


            /* Historial medico del paciente */
            //Datos basicos
            Route::controller($this->patient . MedicalHistoryController::class)->group(function () {
                Route::get('medical_history', 'index');
                Route::get('medical_history/basic_information', 'show');
                Route::post('medical_history/basic_information', 'store');
                Route::put('medical_history/basic_information', 'update');
            });
            //Antecedentes patologicos
            Route::controller($this->patient . PathologicalBackgroudController::class)->group(function () {
                Route::post('medical_history/pathological_background', 'store');
                Route::get('medical_history/pathological_background', 'show');
                Route::put('medical_history/pathological_background', 'update');
            });
            //Antecedentes no patologicos
            Route::controller($this->patient . NonPathologicalBackgroundController::class)->group(function () {
                Route::post('medical_history/non_pathological_background', 'store');
                Route::get('medical_history/non_pathological_background', 'show');
                Route::put('medical_history/non_pathological_background', 'update');
            });
            //Antecedentes Heredofamiliares
            Route::controller($this->patient . HereditaryBackgroundController::class)->group(function () {
                Route::post('medical_history/hereditary_background', 'store');
                Route::get('medical_history/hereditary_background', 'show');
                Route::put('medical_history/hereditary_background', 'update');
            });
            //Historial de vacunacion
            Route::controller($this->patient . VaccinationHistoryController::class)->group(function () {
                Route::post('medical_history/vaccination_history', 'store');
                Route::get('medical_history/vaccination_history', 'show');
                Route::put('medical_history/vaccination_history', 'update');
            });
        });



        /* RUTAS ADMINISTRATIVAS */
        Route::prefix('admin')->group(function () {
            //  MÉDICOS
            Route::controller($this->admin . PhysicianController::class)->group(function () {
                Route::post('/checkphysician', 'check');
            });
            // ROLES (FALTA MOVER A CARPETA ADMIN)
            Route::resource('roles', RoleController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // PERMISOS (FALTA MOVER A CARPETA ADMIN)
            Route::resource('permissions', PermissionController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
        });
        Route::post('facilities', [FacilityController::class, 'store']);
        Route::post('facilities/schedule/{facility}', ScheduleFacilityController::class);
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
