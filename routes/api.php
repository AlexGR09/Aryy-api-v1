<?php

use App\Http\Controllers\AllergyController;
use App\Http\Controllers\API\V1\Admin\PhysicianController;
use App\Http\Controllers\API\V1\FacilityController;
use App\Http\Controllers\API\V1\Patient\HereditaryBackgroundController;
use App\Http\Controllers\API\V1\Patient\NonPathologicalBackgroundController;
use App\Http\Controllers\API\V1\Patient\PathologicalBackgroudController;
use App\Http\Controllers\API\V1\Patient\VaccinationHistoryController;
use App\Http\Controllers\API\V1\Patient\HereditaryBackgroundController;
use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\Physician\PhysicianController as PhysicianPhysicianController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\Search\PhysicianSearchController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\AppointmentsDetailController;
use App\Http\Controllers\BasicInformationController;
use App\Http\Controllers\FacilityScheduleController;
use App\Http\Controllers\FullFacilityController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PerinatalBackgroundController;
use App\Http\Controllers\PhysicianAppointmentController;
use App\Http\Controllers\PhysicianProfileController;
use App\Http\Controllers\PlanController;
use App\Http\Controllers\PyschologicalBackgroundController;
use App\Http\Controllers\SubscriptionUserController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\TestJoseController;
use App\Http\Controllers\VitalSignController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

/* RUTAS API VERSIÓN 1 */

global $v1, $physician, $admin, $search, $catalogues, $patient, $auth;
// V1
$this->v1 = "App\\Http\\Controllers\\API\\V1\\";
// V1
$this->auth = "App\\Http\\Controllers\\API\\V1\\Auth\\";
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


/* RUTAS API VERSIÓN 2 */

global $v2;
// V2
$this->v2 = "App\\Http\\Controllers\\API\\V2\\";



Route::prefix('v1')->group(function () {

    // RUTAS REGISTRO Y LOGIN
    Route::controller($this->auth . AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
    });

    Route::group(['middleware' => ['auth:sanctum']], function () {

        // RUTAS PERFIL DE USUARIO
        Route::prefix('user')->group(function () {
            Route::controller($this->auth . UserController::class)->group(function () {
                Route::get('/profile', 'show');
                Route::put('/profile', 'update');
                Route::delete('/profile', 'destroy');
                Route::get('/logout', 'logout');
            });
        });

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
        Route::resource('/occupations', $this->catalogues . OccupationController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
        //MEDICAL SERVICES
        Route::resource('/medicalservices', $this->catalogues . MedicalServiceController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
        //INSURANCE
        Route::resource('/insurances', $this->catalogues . InsuranceController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
        // ESPECIALIDADES
        Route::resource('/specialties', $this->catalogues . SpecialtyController::class)
            ->only(['index', 'store', 'show', 'update', 'destroy']);
        // ENFERMEDADES
        Route::resource('/diseases', $this->catalogues . DiseaseController::class)
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
        Route::get('/{physician}',[PhysicianPhysicianController::class, 'show']);
        Route::controller(PhysicianProfileController::class)->group(function () {
            Route::get('/profile', 'show');
            Route::post('/profile', 'store');
            Route::put('/profile', 'update');
        });
        // ARCHIVOS DE FORMACIÓN DEL MÉDICO
        Route::controller($this->physician . EducationalBackgroundController::class)->group(function () {
            Route::post('/educational-background/upload-license', 'uploadLicense');
            Route::post('/educational-background/upload-certificate', 'uploadCertificate');
            Route::get('/educational-background/certificate', 'getCertificate');
            Route::delete('/educational-background/certificate', 'deleteCertificate');
        });
        // ARCHIVOS DE IDENTIDAD MÉDICA
        Route::controller($this->physician . MedicalIdentityController::class)->group(function () {
            Route::prefix('medical-indentity')->group(function () {
                Route::get('/', 'index');
                Route::post('/upload-logo', 'uploadLogo');
                Route::get('/logo', 'getLogo');
                Route::delete('/logo', 'deleteLogo');
                Route::post('/upload-physician-photo', 'uploadPhysicianPhoto');
                Route::get('/physician-photo', 'getPhysicianPhoto');
                Route::delete('/physician-photo', 'deletePhysicianPhoto');
                Route::post('/upload-facility-photo', 'uploadFacilityPhoto');
                Route::get('/facility-photo', 'getFacilityPhoto');
                Route::delete('/facility-photo', 'deleteFacilityPhoto');
    
            });
        });
        // SERVICIOS QUE EL MÉDICO OFRECE
        Route::controller($this->physician . MedicalServiceController::class)->group(function () {
            Route::get('/medical-services', 'index');
            Route::put('/medical-services', 'update');
        });
        // ENFERMEDADES QUE EL MÉDICO ATIENDE
        Route::controller($this->physician . DiseaseController::class)->group(function () {
            Route::get('/diseases', 'index');
            Route::post('/diseases', 'store');
            Route::delete('/diseases', 'destroy');
        });

        //DATOS FISCALES DEL MÉDICO
        Route::controller($this->physician . TaxDataController::class)->group(function () {
            Route::post('tax-data', 'store');
            Route::get('tax-data', 'show');
            Route::put('tax-data','update');
            Route::delete('tax-data','destroy');

            Route::post('tax-data/update-constancy','update_constancy');
        });

        // ANTECEDENTES POSTNATALES
        Route::controller($this->physician . PostnatalBackgroundController::class)->group(function () {
            Route::prefix('medical_history')->group(function () {
                Route::get('/postnatal-background', 'show');
                Route::post('/postnatal-background', 'store');
                Route::put('/postnatal-background', 'update');
            });
        });

    });

        /* RUTAS DEL PACIENTE */
        Route::prefix('patient')->group(function () {
            // PACIENTE
            //Perfil de paciente - Informacion basica del perfil
            Route::controller($this->patient . PatientController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/profile', 'store');
                Route::get('/profile/{patient_id}', 'show');
                Route::put('/profile/{patient_id}', 'update');

                Route::get('occupations','occupation');
                Route::get('country', 'country');
                Route::get('country_states', 'country_states');
                Route::get('cities_states', 'cities_states');
            });
            // FOTO DE PERFIL DEL PACIENTE
            Route::controller($this->patient . ProfilePhotoController::class)->group(function () {
                Route::post('/upload-profile-photo/{patient_id}', 'uploadProfilePhoto');
                Route::get('/profile-photo/{patient_id}', 'getProfilePhoto');
            });
            //Perfil del paciente - Seguros de gastos medicos
            Route::controller($this->patient . HealthInsuranceController::class)->group(function () {
                Route::post('profile/health-insurance-data/', 'store');
                Route::get('profile/health-insurance-data/{patient_id}', 'show');
                Route::put('profile/health-insurance-data/{patient_id}', 'update');
                Route::delete('profile/health-insurance-data/{patient_id}', 'destroy');

                Route::get('health-insurance','health_insurance');
            });

            //Perfil del paciente - Ubicacion(es)
            Route::controller($this->patient . LocationController::class)->group(function () {
                Route::post('profile/location/', 'store');
                Route::get('profile/location/{patient_id}', 'show');
                Route::put('profile/location/{patient_id}', 'update');
                Route::delete('profile/location/{patient_id}', 'destroy');
            });
            //Perfil del paciente - Identidad
            Route::controller($this->patient . IdentityController::class)->group(function () {
                Route::post('profile/identity/', 'store');
                Route::get('profile/identity/{patient_id}', 'show');
                Route::delete('profile/identity/{patient_id}', 'destroy');
            });

            // /* Historial medico del paciente */
            // //Datos basicos
            // Route::controller($this->patient . MedicalHistoryController::class)->group(function () {
            //     Route::get('medical_history/{patient_id}', 'index');
            //     Route::post('medical_history/basic_information/', 'store');
            //     Route::get('medical_history/basic_information/{patient_id}', 'show');
            //     Route::put('medical_history/basic_information/{patient_id}', 'update');

            //     Route::get('allergy','allergy');
            //     Route::get('blood_type','blood_type');
            // });
            // //Antecedentes patologicos
            // Route::controller($this->patient . PathologicalBackgroudController::class)->group(function () {
            //     Route::post('medical_history/pathological_background/', 'store');
            //     Route::get('medical_history/pathological_background/{patient_id}', 'show');
            //     Route::put('medical_history/pathological_background/{patient_id}', 'update');
            // });
            // //Antecedentes no patologicos
            // Route::controller($this->patient . NonPathologicalBackgroundController::class)->group(function () {
            //     Route::post('medical_history/non_pathological_background/', 'store');
            //     Route::get('medical_history/non_pathological_background/{patient_id}', 'show');
            //     Route::put('medical_history/non_pathological_background/{patient_id}', 'update');
            // });
            
            // //Antecedentes Heredofamiliares
            // Route::controller($this->patient . HereditaryBackgroundController::class)->group(function () {
            //     Route::post('medical_history/hereditary_background/', 'store');
            //     Route::get('medical_history/hereditary_background/{patient_id}', 'show');
            //     Route::put('medical_history/hereditary_background/{patient_id}', 'update');
            // });
            // //Historial de vacunacion
            // Route::controller($this->patient . VaccinationHistoryController::class)->group(function () {
            //     Route::post('medical_history/vaccination_history/', 'store');
            //     Route::get('medical_history/vaccination_history/{patient_id}', 'show');
            //     Route::put('medical_history/vaccination_history/{patient_id}', 'update');
            // });
        });

        /* RUTAS ADMINISTRATIVAS */
        Route::prefix('admin')->group(function () {
            //  MÉDICOS
            Route::controller(PhysicianController::class)->group(function () {
                Route::get('/check-physicans', 'checkAll');
                Route::get('/check-physician/{physician_id}', 'checkOne');
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
        
        Route::group(['middleware' => ['role:Physician|Patient']], function () {
            Route::get('physician/{physician}/appointments', [PhysicianAppointmentController::class, 'index']);
        });
        Route::get('appointments-detail/phyisician/{physician}', [AppointmentsDetailController::class, 'index']);
        Route::get('appointment/review', [AppointmentController::class, 'review']);

        Route::post('appointments', [AppointmentController::class, 'store']);
        Route::get('appointments', [AppointmentController::class, 'index']);
        Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->middleware('appointment_user');
        Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->middleware('appointment_user');

        Route::get('plans', [PlanController::class, 'index']);
        Route::apiresource('payment-methods',PaymentMethodController::class);
        Route::group(['middleware' => ['role:Physician']], function () {
            Route::get('users/subscriptions', [SubscriptionUserController::class, 'index']);
            Route::post('users/subscriptions', [SubscriptionUserController::class, 'store'])->middleware('user_subscription');
            Route::delete('users/subscriptions', [SubscriptionUserController::class, 'destroy']);
            Route::put('users/subscriptions', [SubscriptionUserController::class, 'update']);
        });

        // CALENDARIO DE CITAS
        Route::prefix('calendar')->group(function () {

            Route::get('/appointments', [$this->physician . CalendarAppointmentController::class, 'index']);
            Route::get('/appointments/{id}', [$this->physician . CalendarAppointmentController::class, 'show']);
            //REGISTRO DE CITAS Y PACIENTE
            Route::post('/appointments', [$this->physician . CalendarAppointmentController::class,'store']);
            Route::put('/appointments/{appointment_id}', [$this->physician . CalendarAppointmentController::class,'update']);
            
            //consulta para los selects
            Route::get('/facilityphysician',[$this->physician . CalendarAppointmentController::class,'facilityphysician']);
            Route::get('/patient/{phone_number}',[$this->physician . CalendarAppointmentController::class,'patient']);
            Route::get('/medicalservice',[$this->physician . CalendarAppointmentController::class,'physicianservice']);
        });

        
        
    });
    Route::prefix('medical-records')->group(function () {
        Route::get('vital-signs/patient/{patient}', [VitalSignController::class, 'show']);
        Route::post('vital-signs/patient', [VitalSignController::class, 'store']);
        Route::put('vital-signs/{vitalSign}/patient', [VitalSignController::class, 'update']);
        Route::get('info/patient/{patient}', [VitalSignController::class, 'patientInfo']);
        Route::get('allergies/patient/{patient}', [AllergyController::class, 'show']);
        Route::post('allergies/patient', [AllergyController::class, 'store']);
        Route::put('allergies/patient/{patient}', [AllergyController::class, 'update']);

        Route::get('allergies/patient/{patient}', [PostnatalBackgroundController::class, 'show']);
        Route::post('allergies/patient/{patient}', [PostnatalBackgroundController::class, 'store']);
        Route::put('allergies/patient/{patient}', [PostnatalBackgroundController::class, 'update']);
        
        Route::put('basic-information/patient/{patient}', [BasicInformationController::class, 'show']);

        

    });
    Route::prefix('medical-history')->group(function(){
        Route::controller($this->patient . MedicalHistoryController::class)->group(function () {
            /* Route::get('/{patient_id}','index'); */
            Route::post('/basic-information', 'store');
            Route::get('/basic-information/{patient_id}', 'show');
            Route::put('/basic-information/{patient_id}', 'update');
            
            Route::get('/allergy','allergy');
            Route::get('/blood-type','blood_type');
        });

        Route::controller($this->physician . GynecologicalHistoryController::class)->group(function () {
            Route::post('/gynecological-history/{patient_id}','store');
            Route::get('/gynecological-history/patient/{patient_id}','show');
            Route::put('/gynecological-history/patient/{patient_id}','update');
        });

        Route::controller($this->physician . PerinatalBackgroundController::class)->group(function(){
            Route::post('/perinatal-background/{patient_id}','store');
        });

        Route::get('pathological-background/patient/{patient}', [PathologicalBackgroudController::class, 'show']);
        Route::post('pathological-background', [PathologicalBackgroudController::class, 'store']);
        Route::put('pathological-background/patient/{patient}', [PathologicalBackgroudController::class, 'update']);
        
        Route::get('non-pathological-background/patient/{patient}', [NonPathologicalBackgroundController::class, 'show']);
        Route::post('non-pathological-background', [NonPathologicalBackgroundController::class, 'store']);
        Route::put('non-pathological-background/patient/{patient}', [NonPathologicalBackgroundController::class, 'update']);
        
        Route::get('hereditary-background/patient/{patient}', [HereditaryBackgroundController::class, 'show']);
        Route::post('hereditary-background', [HereditaryBackgroundController::class, 'store']);
        Route::put('hereditary-background/patient/{patient}', [HereditaryBackgroundController::class, 'update']);
        
        Route::post('vaccination-history/', [VaccinationHistoryController::class, 'store']);
        Route::get('vaccination-history/patient/{patient_id}', [VaccinationHistoryController::class, 'show']);

        Route::get('pyschological-background/patient/{patient}', [PyschologicalBackgroundController::class, 'show']);
        Route::post('pyschological-background', [PyschologicalBackgroundController::class, 'store']);
        Route::put('pyschological-background/patient/{patient}', [PyschologicalBackgroundController::class, 'update']);

        Route::get('perinatal-background/patient/{patient}', [PerinatalBackgroundController::class, 'show']);
        Route::post('perinatal-background', [PerinatalBackgroundController::class, 'store']);
        Route::put('perinatal-background/patient/{patient}', [PerinatalBackgroundController::class, 'update']);

        Route::post('survey', [SurveyController::class, 'store']);
    });
    /* BÚSQUEDAS */
    // BUSQUEDA MÉDICO MOBILE
    // Route::get('/search', [$this->search . SearchController::class, 'index']);
    // BUSQUEDA DEFINIDA DE MÉDICO
    Route::get('/search', [PhysicianSearchController::class, 'index']);
});



Route::prefix('v2')->group(function () {

    Route::group(['middleware' => ['auth:sanctum']], function () {

        /* RUTAS DEL PACIENTE */
        Route::prefix('patient')->group(function () {
            // PERFIL DEL MÉDICO
            Route::controller($this->v2 . 'Patient\\' . PatientController::class)->group(function () {
                Route::post('/profile', 'store');
            });
        });

    });
    
});


/* TESTS */
// JOSÉ
Route::get('/testjose', [TestJoseController::class, 'index']);
Route::post('/testjose', [TestJoseController::class, 'testpost']);
Route::put('/testjose/{id}', [TestJoseController::class, 'testupdate']);

