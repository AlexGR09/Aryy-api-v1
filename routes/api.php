<?php

use App\Http\Controllers\API\V1\FacilityController;
use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\FacilityScheduleController;
use App\Http\Controllers\FullFacilityController;
// use App\Http\Controllers\API\V1\Search\PhysicianSearchController;
// use App\Http\Controllers\API\V1\Search\SearchController;
use App\Http\Controllers\TestJoseController;
use Illuminate\Support\Facades\Route;

/* RUTAS API VERSIÓN 1 */

global $v1, $physician, $admin, $search, $catalogues, $patient;
// V1
$this->v1 = 'App\\Http\\Controllers\\API\\V1\\';
// MÉDICO
$this->physician = 'App\\Http\\Controllers\\API\\V1\\Physician\\';
// MÉDICO
$this->admin = 'App\\Http\\Controllers\\API\\V1\\Admin\\';
// BÚSQUEDA
$this->search = 'App\\Http\\Controllers\\API\\V1\\Search\\';
// CATALÓGOS
$this->catalogues = 'App\\Http\\Controllers\\API\\V1\\Catalogues\\';
//PACIENTE
$this->patient = 'App\\Http\\Controllers\\API\\V1\\Patient\\';

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
            Route::post('/uploadprofilephoto', 'uploadProfilePhoto')->middleware(['auth:sanctum']);
            Route::get('/getprofilephoto', 'getProfilePhoto')->middleware(['auth:sanctum']);
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
            Route::controller($this->catalogues.CityController::class)->group(function () {
                Route::get('/cities', 'index');
                Route::get('/citiesofstate', 'citiesOfState');
                Route::get('/cities/{city}', 'show');
                Route::post('/cities', 'store');
                Route::put('/cities/{city}', 'update');
                Route::delete('/cities/{city}', 'destroy');
            });
            //OCUPACIONES
            Route::resource('ocupations', $this->catalogues.OccupationController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            //MEDICAL SERVICES
            Route::resource('/medicalservices', $this->catalogues.MedicalServiceController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            //INSURANCE
            Route::resource('insurance', $this->catalogues.InsuranceController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // ESPECIALIDADES
            Route::resource('/specialties', $this->catalogues.SpecialtyController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // ENFERMEDADES
            Route::resource('/diseases', $this->catalogues.DiseaseController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
            // SUB ESPECIALIDADES
            Route::controller($this->catalogues.SubSpecialtyController::class)->group(function () {
                Route::get('/subspecialties', 'index');
                Route::get('/subspecialtiesofspecialty', 'subSpecialtiesOfSpecialty');
            });
        });

        /* RUTAS DEL MÉDICO */
        Route::prefix('physician')->group(function () {
            // PERFIL DEL MÉDICO
            Route::controller($this->physician.PhysicianController::class)->group(function () {
                Route::get('/profile', 'show');
                Route::post('/profile', 'store');
                Route::put('/profile', 'update');
            });
            // ARCHIVOS DE FORMACIÓN DEL MÉDICO
            Route::controller($this->physician.EducationalBackgroundController::class)->group(function () {
                Route::post('/educationalbackground/uploadlicense', 'uploadLicense');
                Route::post('/educationalbackground/uploadcertificate', 'uploadCertificate');
                Route::get('/educationalbackground/getcertificate', 'getCertificate');
                Route::delete('/educationalbackground/deletecertificate', 'deleteCertificate');
            });
            // ARCHIVOS DE IDENTIDAD MÉDICA
            Route::controller($this->physician.MedicalIdentityController::class)->group(function () {
                Route::get('/medicalindentity', 'index');
                Route::post('/medicalindentity/uploadlogo', 'uploadLogo');
                Route::get('/medicalindentity/getlogo', 'getLogo');
                Route::delete('/medicalindentity/deletelogo', 'deleteLogo');
                Route::post('/medicalindentity/uploadphysicianphoto', 'uploadPhysicianPhoto');
                Route::get('/medicalindentity/getphysicianphoto', 'getPhysicianPhoto');
                Route::delete('/medicalindentity/deletephysicianphoto', 'deletePhysicianPhoto');
                Route::post('/medicalindentity/uploadfacilityphoto', 'uploadFacilityPhoto');
                Route::get('/medicalindentity/getfacilityphoto', 'getFacilityPhoto');
                Route::delete('/medicalindentity/deletefacilityphoto', 'deleteFacilityPhoto');
            });
            // SERVICIOS QUE EL MÉDICO OFRECE
            Route::controller($this->physician.MedicalServiceController::class)->group(function () {
                Route::put('/medicalservice', 'update');
            });
            // ENFERMEDADES QUE EL MÉDICO ATIENDE
            Route::controller($this->physician.DiseaseController::class)->group(function () {
                Route::get('/disease', 'index');
                Route::post('/disease', 'store');
                Route::delete('/disease', 'destroy');
            });

            //DATOS FISCALES DEL MÉDICO
            Route::controller($this->physician.TaxDataController::class)->group(function () {
                Route::post('tax_data', 'store');
                Route::get('tax_data', 'show');
                Route::put('tax_data', 'update');
                Route::delete('tax_data', 'destroy');
            });
        });

        /* RUTAS DEL PACIENTE */
        Route::prefix('patient')->group(function () {
            // PACIENTE
            //Perfil de paciente - Informacion basica del perfil
            Route::controller($this->patient.PatientController::class)->group(function () {
                Route::get('profile/basic_information', 'show');
                Route::post('profile/basic_information', 'store');
                Route::put('profile/basic_information', 'update');
                Route::delete('profile/basic_information', 'destroy_occupation');

                Route::get('country', 'country');
                Route::get('country_states', 'country_states');
                Route::get('cities_states', 'cities_states');
            });
            //Perfil del paciente - Seguros de gastos medicos
            Route::controller($this->patient.HealthInsuranceController::class)->group(function () {
                Route::post('profile/health_insurance_data', 'store');
                Route::get('profile/health_insurance_data', 'show');
                Route::put('profile/health_insurance_data', 'update');
                Route::delete('profile/health_insurance_data', 'destroy');
            });

            //Perfil del paciente - Ubicacion(es)
            Route::controller($this->patient.LocationController::class)->group(function () {
                Route::get('profile/location', 'show');
                Route::post('profile/location', 'store');
                Route::put('profile/location', 'update');
                Route::delete('profile/location', 'destroy');
            });
            //Perfil del paciente - Identidad
            Route::controller($this->patient.IdentityController::class)->group(function () {
                Route::get('profile/identity', 'show');
                Route::post('profile/identity', 'store');
                Route::delete('profile/identity', 'destroy');
            });

            /* Historial medico del paciente */
            //Datos basicos
            Route::controller($this->patient.MedicalHistoryController::class)->group(function () {
                Route::get('medical_history', 'index');
                Route::get('medical_history/basic_information', 'show');
                Route::post('medical_history/basic_information', 'store');
                Route::put('medical_history/basic_information', 'update');

                Route::get('allergy','allergy');
                Route::get('blood_type','blood_type');
            });
            //Antecedentes patologicos
            Route::controller($this->patient.PathologicalBackgroudController::class)->group(function () {
                Route::post('medical_history/pathological_background', 'store');
                Route::get('medical_history/pathological_background', 'show');
                Route::put('medical_history/pathological_background', 'update');
            });
            //Antecedentes no patologicos
            Route::controller($this->patient.NonPathologicalBackgroundController::class)->group(function () {
                Route::post('medical_history/non_pathological_background', 'store');
                Route::get('medical_history/non_pathological_background', 'show');
                Route::put('medical_history/non_pathological_background', 'update');
            });

            //Antecedentes Heredofamiliares
            Route::controller($this->patient.HereditaryBackgroundController::class)->group(function () {
                Route::post('medical_history/hereditary_background', 'store');
                Route::get('medical_history/hereditary_background', 'show');
                Route::put('medical_history/hereditary_background', 'update');
            });
            //Historial de vacunacion
            Route::controller($this->patient.VaccinationHistoryController::class)->group(function () {
                Route::post('medical_history/vaccination_history', 'store');
                Route::get('medical_history/vaccination_history', 'show');
                Route::put('medical_history/vaccination_history', 'update');
            });
        });

        /* RUTAS ADMINISTRATIVAS */
        Route::prefix('admin')->group(function () {
            //  MÉDICOS
            Route::controller($this->admin.PhysicianController::class)->group(function () {
                Route::post('/checkphysician', 'check');
            });
            // ROLES (FALTA MOVER A CARPETA ADMIN)
            Route::resource('roles', RoleController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // PERMISOS (FALTA MOVER A CARPETA ADMIN)
            Route::resource('permissions', PermissionController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
        });

        Route::get('facilities', [FacilityController::class, 'index']);
        Route::get('facilities/{facility}', [FacilityController::class, 'show']);
        Route::post('facilities', [FacilityController::class, 'store']);
        Route::put('facilities/schedule/{facility}', [FacilityScheduleController::class, 'schedule']);
        Route::post('facilities/full/{facility?}', [FullFacilityController::class, 'store']);
        Route::delete('facilities/{facility}', [FacilityController::class, 'delete']);

        Route::post('appointments', [AppointmentController::class, 'store']);
        Route::get('appointments', [AppointmentController::class, 'index']);
        Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->middleware('appointment_user');
        Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->middleware('appointment_user');
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

