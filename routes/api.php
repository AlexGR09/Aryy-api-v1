<?php

use App\Http\Controllers\API\V1\Admin\PhysicianController;
use App\Http\Controllers\API\V1\AppointmentController;
use App\Http\Controllers\API\V1\FacilityController;
use App\Http\Controllers\API\V1\Patient\AllergyController;
use App\Http\Controllers\API\V1\Patient\AppointmentController as PatientAppointmentController;
use App\Http\Controllers\API\V1\Patient\BasicInformationController;
use App\Http\Controllers\API\V1\Patient\PaymentMethodController;
use App\Http\Controllers\API\V1\Patient\PrescriptionController as PatientPrescriptionController;
use App\Http\Controllers\API\V1\Patient\VitalSignController;
use App\Http\Controllers\API\V1\PermissionController;
use App\Http\Controllers\API\V1\Physician\AppointmentsDetailController;
use App\Http\Controllers\API\V1\Physician\FacilityScheduleController;
use App\Http\Controllers\API\V1\Physician\FullFacilityController;
use App\Http\Controllers\API\V1\Physician\HereditaryBackgroundController as PhysicianHereditaryBackgroundController;
use App\Http\Controllers\API\V1\Physician\NonPathologicalBackgroundController as PhysicianNonPathologicalBackgroundController;
use App\Http\Controllers\API\V1\Physician\PathologicalBackgroundController as PhysicianPathologicalBackgroundController;
use App\Http\Controllers\API\V1\Physician\PhysicianAppointmentController;
use App\Http\Controllers\API\V1\Physician\PhysicianDetailController;
use App\Http\Controllers\API\V1\Physician\PhysicianProfileController;
use App\Http\Controllers\API\V1\Physician\SubscriptionUserController;
use App\Http\Controllers\API\V1\PhysicianMedicalAppointmentController;
use App\Http\Controllers\API\V1\PlanController;
use App\Http\Controllers\API\V1\RoleController;
use App\Http\Controllers\API\V1\Search\PhysicianSearchController;
use App\Http\Controllers\TestJoseController;
use Illuminate\Support\Facades\Route;

/* RUTAS API VERSIÓN 1 */

global $v1, $physician, $admin, $search, $catalogues, $patient, $auth;
// V1
$this->v1 = 'App\\Http\\Controllers\\API\\V1\\';
// V1
$this->auth = 'App\\Http\\Controllers\\API\\V1\\Auth\\';
// MÉDICO
$this->physician = 'App\\Http\\Controllers\\API\\V1\\Physician\\';
// ADMIN
$this->admin = 'App\\Http\\Controllers\\API\\V1\\Admin\\';
// BÚSQUEDA
$this->search = 'App\\Http\\Controllers\\API\\V1\\Search\\';
// CATALÓGOS
$this->catalogues = 'App\\Http\\Controllers\\API\\V1\\Catalogues\\';
//PACIENTE
$this->patient = 'App\\Http\\Controllers\\API\\V1\\Patient\\';

/* RUTAS API VERSIÓN 2 */

global $v2, $patient_v2;
// V2
$this->v2 = 'App\\Http\\Controllers\\API\\V2\\';
// PATIENT
$this->patient_v2 = 'App\\Http\\Controllers\\API\\V2\\Patient\\';

Route::prefix('v1')->group(function () {
    // RUTAS REGISTRO Y LOGIN
    Route::controller($this->auth . AuthController::class)->group(function () {
        Route::post('/login', 'login');
        Route::post('/register', 'register');
    }
    );

    Route::group(['middleware' => ['auth:sanctum']], function () {
        // RUTAS PERFIL DE USUARIO
        Route::prefix('user')->group(function () {
            Route::controller($this->auth . UserController::class)->group(function () {
                Route::get('/profile', 'show');
                Route::put('/profile', 'update');
                Route::delete('/profile', 'destroy');
                Route::get('/logout', 'logout');
            }
            );
        }
        );
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
                Route::get('/state/{state_id}/cities', 'citiesOfState');
                Route::get('/city/{city}', 'show');
                Route::post('/city', 'store');
                Route::put('/city/{city}', 'update');
                Route::delete('/city/{city}', 'destroy');
            }
            );
            //OCUPACIONES
            Route::resource('/occupations', $this->catalogues . OccupationController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            //MEDICAL SERVICES
            /* Route::resource('/medical-services', $this->catalogues . MedicalServiceController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']); */
            Route::controller($this->catalogues.MedicalServiceController::class)->group(function(){
                Route::get('/medical_services','index');
                Route::post('/medical_services','post');
                Route::put('/medical_services/{medical_services}','update');
                Route::delete('/medical_services/{medical_services}', 'destroy');

                Route::get('/specialty/{specialty_id}/medical-services','medicalServicesSpecialty');
            });
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
                Route::get('/specialty/{specialty_id}/sub-specialties', 'subSpecialtiesOfSpecialty');
            }
            );
            Route::controller($this->catalogues . BloodTypeController::class)->group(function () {
                Route::get('/blood-type', 'index');
            });
            Route::controller($this->catalogues . AlergyController::class)->group(function () {
                Route::get('/allergy', 'index');
            });
            // ENFERMEDADES TIROIDEAS
            Route::resource('/thyroid-diseases', $this->catalogues. ThyroidDiseaseController::class)
                ->only(['index', 'show']);
            // CÁNCERES
            Route::resource('/cancers', $this->catalogues.CancerController::class)
                ->only(['index', 'show']);
            // ENFERMEDADES DE LA SANGRE
            Route::resource('/blood-diseases', $this->catalogues.BloodDiseaseController::class)
                ->only(['index', 'show']);
            // CÁLCULOS RENALES
            Route::resource('/kidney-stones', $this->catalogues.KidneyStoneController::class)
                ->only(['index', 'show']);
            // HEPATITIS
            Route::resource('/hepatitis', $this->catalogues.HepatitisController::class)
                ->only(['index', 'show']);
            // PATOLOGÍAS RESPIRATORIAS
            Route::resource('/respiratory-pathologies', $this->catalogues.RespiratoryPathologyController::class)
                ->only(['index', 'show']);
        });

        /* RUTAS DEL MÉDICO */
        Route::prefix('physician')->group(function () {
            // PERFIL DEL MÉDICO
            Route::controller(PhysicianProfileController::class)->group(function () {
                Route::get('/profile', 'show');
                Route::post('/profile', 'store');
                Route::put('/profile', 'update');
            }
            );
            // ARCHIVOS DE FORMACIÓN DEL MÉDICO
            Route::controller($this->physician . EducationalBackgroundController::class)->group(function () {
                Route::post('/educational-background/upload-license', 'uploadLicense');
                Route::post('/educational-background/upload-certificate', 'uploadCertificate');
                Route::get('/educational-background/certificate', 'getCertificate');
                Route::delete('/educational-background/certificate', 'deleteCertificate');
            }
            );
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
                }
                );
            }
            );
            // SERVICIOS QUE EL MÉDICO OFRECE
            Route::controller($this->physician . MedicalServiceController::class)->group(function () {
                Route::get('/medical-services', 'index');
                Route::put('/medical-services', 'update');
            }
            );
            // ENFERMEDADES QUE EL MÉDICO ATIENDE
            Route::controller($this->physician . DiseaseController::class)->group(function () {
                Route::get('/diseases', 'index');
                Route::post('/diseases', 'store');
                Route::delete('/diseases', 'destroy');
            }
            );

            //DATOS FISCALES DEL MÉDICO
            Route::controller($this->physician . TaxDataController::class)->group(function () {
                Route::post('tax-data', 'store');
                Route::get('tax-data', 'show');
                Route::put('tax-data', 'update');
                Route::delete('tax-data', 'destroy');

                Route::post('tax-data/update-constancy', 'update_constancy');
            }
            );

            Route::prefix('medical-history')->group(function () {
                Route::controller($this->physician . MedicalHistoryController::class)->group(function () {
                    Route::get('/patient/{patient_id}', 'index');
                }
                );
                //HISTORIAL GINECOLOGICO
                Route::controller($this->physician.ObstetricGynecologicalBackgroundController::class)->group(function () {
                    Route::post('/patient/{patient_id}/obstetric-gynecological-background', 'store');
                    Route::get('/patient/{patient_id}/obstetric-gynecological-background', 'show');
                    Route::patch('/patient/{patient_id}/obstetric-gynecological-background','update');
                });
                //ANTECEDENTES PERINATALES
                Route::controller($this->physician . PerinatalBackgroundController::class)->group(function () {
                    Route::post('/patient/{patient_id}/perinatal-background', 'store');
                    Route::get('/patient/{patient_id}/perinatal-background', 'show');
                    Route::patch('/patient/{patient_id}/perinatal-background', 'update');
                }
                );
                //HISTORIAL PSIQUIATRICO
                Route::controller($this->physician . PyschologicalBackgroundController::class)->group(function () {
                    Route::post('/patient/{patient_id}/psychological-background', 'store');
                    Route::get('/patient/{patient_id}/psychological-background', 'show');
                    Route::patch('/patient/{patient_id}/psychological-background', 'update');
                }
                );

                // HISTORIAL DE VACUNACION
                Route::controller($this->physician . VaccinationHistoryController::class)->group(function () {
                    Route::post('/patient/{patient_id}/vaccination-history', 'store');
                    Route::get('/patient/{patient_id}/vaccination-history', 'show');
                }
                );

                // ANTECEDENTES POSTNATALES
                Route::controller($this->physician.PostnatalBackgroundController::class)->group(function () {
                    Route::get('/patient/{patient_id}/postnatal-background', 'show');
                    Route::post('/patient/{patient_id}/postnatal-background', 'store');
                    Route::patch('/patient/{patient_id}/postnatal-background', 'update');
                });

                //VISUALIZAR LOS MEDICAMENTOS ACTIVOS Y MEDICAMENTOS ANTERIORES DE UN PACIENTE
                Route::controller($this->physician . ViewMedicationsController::class)->group(function () {
                    Route::get('/patient/{patient_id}/medication', 'medicationPatient');
                }
                );
                //Actualizar las alergias o alergia de un paciente
                Route::patch('patient/{patient_id}/allergies', [AllergyController::class, 'update']);

                Route::get('patient/{patient}/allergies', [AllergyController::class, 'show']);

                Route::post('/patient/{patient_id}/allergies', [AllergyController::class, 'store']);
            }
            );

            Route::prefix('medical-appointments')->group(function () {
                // CONSULTAS MÉDICAS
                Route::controller($this->physician . MedicalAppointmentController::class)->group(function () {
                    Route::get('/patient/{patient_id}', 'index');
                    Route::get('/{medical_appointment_id}', 'show');
                    Route::put('/{medical_appointment_id}', 'updateNote');
                }
                );

                // RECETAS MÉDICAS
                Route::controller($this->physician . PrescriptionController::class)->group(function () {
                    Route::post('{medical_appointment_id}/prescriptions', 'store');
                }
                );
            }
            );
            // CUESTIONARIOS PERSONALIZADOS
            Route::controller($this->physician . PersonalizedQuestionnaireController::class)->group(function () {
                Route::get('/personalized-questionnaire', 'index');
                Route::get('/personalized-questionnaire/{personalized_questionnaire_id}', 'show');
                Route::post('/personalized-questionnaire', 'store');
                Route::put('/personalized-questionnaire/{personalized_questionnaire_id}', 'update');
            }
            );

            //EDITAR ESTADO DEL TRATAMIENTO
            Route::controller($this->physician . StatusTreatmentController::class)->group(function () {
                /* Route::put('status-medicine/{medical_history_id}', 'update'); */
                Route::put('/patient/{patient_id}/status-treatment', 'update');

            }
            );

            //LISTADO DE PACIENTES
            Route::controller($this->physician . MyPatientsController::class)->group(function () {
                Route::get('/list-patients', 'index');
            }
            );
        }
        );

        /* RUTAS DEL PACIENTE */
        Route::prefix('patient')->group(function () {
            // PACIENTE
            //Perfil de paciente - Informacion basica del perfil
            Route::controller($this->patient . PatientController::class)->group(function () {
                Route::get('/', 'index');
                Route::post('/profile', 'store');
                Route::get('/profile/{patient_id}', 'show');
                Route::put('/profile/{patient_id}', 'update');

                Route::get('occupations', 'occupation');
                Route::get('country', 'country');
                Route::get('country_states', 'country_states');
                Route::get('cities_states', 'cities_states');
            }
            );
            // FOTO DE PERFIL DEL PACIENTE
            Route::controller($this->patient . ProfilePhotoController::class)->group(function () {
                Route::post('/upload-profile-photo/{patient_id}', 'uploadProfilePhoto');
                Route::get('/profile-photo/{patient_id}', 'getProfilePhoto');
            }
            );
            //Perfil del paciente - Seguros de gastos medicos
            Route::controller($this->patient . HealthInsuranceController::class)->group(function () {
                Route::post('profile/health-insurance-data/', 'store');
                Route::get('profile/health-insurance-data/{patient_id}', 'show');
                Route::put('profile/health-insurance-data/{patient_id}', 'update');
                Route::delete('profile/health-insurance-data/{patient_id}', 'destroy');

                Route::get('health-insurance', 'health_insurance');
            }
            );

            //Perfil del paciente - Ubicacion(es)
            Route::controller($this->patient . LocationController::class)->group(function () {
                Route::post('profile/location/', 'store');
                Route::get('profile/location/{patient_id}', 'show');
                Route::put('profile/location/{patient_id}', 'update');
                Route::delete('profile/location/{patient_id}', 'destroy');
            }
            );
            //Perfil del paciente - Identidad
            Route::controller($this->patient . IdentityController::class)->group(function () {
                Route::post('profile/identity/', 'store');
                Route::get('profile/identity/{patient_id}', 'show');
                Route::delete('profile/identity/{patient_id}', 'destroy');
            }
            );

            // /* Historial medico del paciente */
            //Datos basicos
            Route::prefix('medical-history')->group(function () {
                //Datos basicos del paciente
                Route::controller($this->patient . MedicalHistoryController::class)->group(function () {
                    Route::get('/{patient_id}', 'index');
                    Route::post('/basic-information', 'store');
                    Route::get('/basic-information/{patient_id}', 'show');
                    Route::put('/basic-information/{patient_id}', 'update');

                    Route::get('/allergy', 'allergy');
                    Route::get('/blood-type', 'blood_type');
                }
                );
                //Antecedentes patologicos
                Route::controller($this->patient . PathologicalBackgroundController::class)->group(function () {
                    Route::post('/pathological-background', 'store');
                    Route::get('/pathological-background/{patient_id}', 'show');
                    Route::put('/pathological-background/{patient_id}', 'update');
                }
                );
                //Antecedentes no patologicos
                Route::controller($this->patient . NonPathologicalBackgroundController::class)->group(function () {
                    Route::post('/non-pathological-background', 'store');
                    Route::get('/non-pathological-background/{patient_id}', 'show');
                    Route::put('/non-pathological-background/{patient_id}', 'update');
                }
                );
                //Antecedentes Heredofamiliares
                Route::controller($this->patient . HereditaryBackgroundController::class)->group(function () {
                    Route::post('/hereditary-background', 'store');
                    Route::get('/hereditary-background/{patient_id}', 'show');
                    Route::put('/hereditary-background/{patient_id}', 'update');
                }
                );
                //Historial de vacunacion
                Route::controller($this->patient . VaccinationHistoryController::class)->group(function () {
                    Route::post('/vaccination-history', 'store');
                    Route::get('/vaccination-history/{patient_id}', 'show');
                    Route::put('/vaccination-history/{patient_id}', 'update');
                }
                );

                //rutas jorge antecedentes ginecologicos
            }
            );
            //MEDICOS FAVORITOS DE UN PACIENTE
            Route::controller($this->patient . FavoriteController::class)->group(function () {
                Route::patch('{patient_id}/favorites/{physician_id}', 'favoritephysician');
                Route::get('{patient_id}/favorites', 'show');
                Route::get('{patient_id}/favorites/{physician_id}', 'physicianInfo');
                /* Route::delete('{patient_id}/favorites/{physician_id}', 'destroy'); */
            }
            );
        }
        );
        /* RUTAS ADMINISTRATIVAS */
        Route::prefix('admin')->group(function () {
            //  MÉDICOS
            Route::controller(PhysicianController::class)->group(function () {
                Route::get('/check-physicans', 'checkAll');
                Route::get('/check-physician/{physician_id}', 'checkOne');
            }
            );
            // ROLES (FALTA MOVER A CARPETA ADMIN)
            Route::resource('roles', RoleController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
            // PERMISOS (FALTA MOVER A CARPETA ADMIN)
            Route::resource('permissions', PermissionController::class)
                ->only(['index', 'store', 'show', 'update', 'destroy']);
        }
        );

        Route::get('facilities', [FacilityController::class, 'index']);
        Route::get('facilities/{facility}', [FacilityController::class, 'show']);
        Route::post('facilities', [FacilityController::class, 'store']);
        Route::put('schedule/facilities/{facility}', [FacilityScheduleController::class, 'schedule']); 
        Route::post('facilities/full', [FullFacilityController::class, 'store']);
        Route::post('facilities/full/{facility?}', [FullFacilityController::class, 'update']);
        Route::delete('facilities/{facility}', [FacilityController::class, 'delete']);

        Route::group(['middleware' => ['role:Physician|Patient']], function () {
            Route::get('/calendar/physician/{physician}/medical-appointment', [PhysicianAppointmentController::class, 'index']);
            Route::post('/calendar/patient/{patient}/physician/{physician}/medical-appointment', [PhysicianAppointmentController::class, 'store']);
            Route::put('/calendar/patient/{patient}/physician/{physician}/medical-appointment/{medicalAppointment}', [PhysicianAppointmentController::class, 'update']);
        }
        );
        Route::group(['middleware' => ['role:Physician|Patient']], function () {
            Route::get('/patient/{patient}/medical-appointment', [PhysicianMedicalAppointmentController::class, 'index']);
            Route::delete('/patient/{patient}/medical-appointment/{medicalAppointment}', [PhysicianMedicalAppointmentController::class, 'destroy']);
        }
        );
        Route::get('appointments-detail/phyisician/{physician}', [AppointmentsDetailController::class, 'index']);
        Route::get('appointment/review', [AppointmentController::class, 'review']);

        Route::post('appointments', [AppointmentController::class, 'store']);
        Route::get('appointments', [AppointmentController::class, 'index']);
        Route::put('appointments/{appointment}', [AppointmentController::class, 'update'])->middleware('appointment_user');
        Route::delete('appointments/{appointment}', [AppointmentController::class, 'destroy'])->middleware('appointment_user');

        Route::get('plans', [PlanController::class, 'index']);
        Route::apiresource('payment-methods', PaymentMethodController::class);
        Route::group(['middleware' => ['role:Physician']], function () {
            Route::get('/physician/{physician}/subscriptions', [SubscriptionUserController::class, 'index']);
            Route::post('/subscriptions', [SubscriptionUserController::class, 'store'])->middleware('user_subscription');
            Route::delete('/physician/{physician}/subscriptions', [SubscriptionUserController::class, 'destroy']);
            Route::put('/physician/{physician}/subscriptions', [SubscriptionUserController::class, 'update']);
        }
        );

        // CALENDARIO DE CITAS
        Route::prefix('calendar')->group(function () {
            Route::get('/appointments', [$this->physician . CalendarAppointmentController::class, 'index']);
            Route::get('/appointments/{appointment_id}', [$this->physician . CalendarAppointmentController::class, 'show']);
            //REGISTRO DE CITAS Y PACIENTE
            Route::post('/appointments', [$this->physician . CalendarAppointmentController::class, 'store']);
            Route::put('/appointments/{appointment_id}', [$this->physician . CalendarAppointmentController::class, 'update']);

            //ruta de prueba
            Route::post('/new-patient/appointment',[$this->physician . CalendarAppointmentController::class, 'newEmergencyPatient']);



            //consulta para los selects
            Route::get('/facilityphysician', [$this->physician . CalendarAppointmentController::class, 'facilityphysician']);
            Route::get('/patient/{phone_number}', [$this->physician . CalendarAppointmentController::class, 'patient']);
            Route::get('/medicalservice', [$this->physician . CalendarAppointmentController::class, 'physicianservice']);
        }
        );

        Route::post('patients/{patient}/appointments', [PatientAppointmentController::class, 'store']);

        Route::get('patients/medical-appointments/{medicalAppointment}/prescription', [PatientPrescriptionController::class, 'index']);

    }
    );
    Route::put('basic-information/patient/{patient}', [BasicInformationController::class, 'storePatientInfo']);
    Route::get('basic-information/patient/{patient}/medical-apointment/{medicalAppointment}', [BasicInformationController::class, 'show']);

    Route::get('physician/{physician}/details', [PhysicianDetailController::class, 'show']);

    Route::group(['prefix' => 'medical-records'], function () {
        Route::get('vital-signs/patient/{patient}', [VitalSignController::class, 'show']);
        Route::post('vital-signs/patient', [VitalSignController::class, 'store']);
        Route::put('vital-signs/{vitalSign}/patient', [VitalSignController::class, 'update']);

        Route::get('info/patient/{patient}', [VitalSignController::class, 'patientInfo']);
        /* Route::get('physician/allergies/patient/{patient}', [AllergyController::class, 'show']);
        Route::post('physician/allergies/patient', [AllergyController::class, 'store']); */
        /* Route::patch('physician/allergies/patient/{patient_id}', [AllergyController::class, 'update']); */

        // Route::get('basic-information/vital-signs/patient/{patient}/medical-appointment/{medicalAppointment}', [BasicInformationController::class, 'show']);
        // Route::post('basic-information/vital-signs', [BasicInformationController::class, 'store']);
        // Route::put('basic-information/vital-signs/patient/{patient}/medical-appointment/{medicalAppointment}', [BasicInformationController::class, 'update']);
    }
    );

    // Route::patch('/physician/medical-history/patient/{patient}/pathological-background',[PatientPathologicalBackgroundController::class, 'update']);
    // Route::patch('/physician/medical-history/patient/{patient}/non-pathological-background',[PatientNonPathologicalBackgroundController::class, 'update']);
    // Route::patch('/physician/medical-history/patient/{patient}/hereditary-background',[PatientHereditaryBackgroundController::class, 'update']);
    // Route::patch('/physician/medical-history/patient/{patient}/psychological-background',[PatientPhysicologicalBackgroundController::class, 'update']);

    
    Route::group(['prefix' => 'medical-history'], function () {
        Route::get('physician/pathological-background/patient/{patient}', [
        PhysicianPathologicalBackgroundController::class, 'show']);
        Route::post('physician/pathological-background', [PhysicianPathologicalBackgroundController::class, 'store']);
        Route::patch('physician/pathological-background/patient/{patient}', [PhysicianPathologicalBackgroundController::class, 'update']);

        Route::get('physician/non-pathological-background/patient/{patient}', [PhysicianNonPathologicalBackgroundController::class, 'show']);
        Route::post('/physician/non-pathological-background', [PhysicianNonPathologicalBackgroundController::class, 'store']);
        Route::patch('physician/non-pathological-background/patient/{patient}', [PhysicianNonPathologicalBackgroundController::class, 'update']);

        Route::get('physician/hereditary-background/patient/{patient}', [PhysicianHereditaryBackgroundController::class, 'show']);
        Route::post('physician/hereditary-background', [PhysicianHereditaryBackgroundController::class, 'store']);
        Route::patch('physician/hereditary-background/patient/{patient}', [PhysicianHereditaryBackgroundController::class, 'update']);

        Route::put('basic-information/patient/{patient}', [BasicInformationController::class, 'show']);
    }
    );
    /* BÚSQUEDAS */
    // BUSQUEDA MÉDICO MOBILE
    // BUSQUEDA DEFINIDA DE MÉDICO
    Route::get('/search', [PhysicianSearchController::class, 'index']);
    Route::post('/search', [PhysicianSearchController::class, 'index']);

    Route::get('build-id', function () {
        $path = base_path('.git/');

        if (!file_exists($path)) {
            return;
        }

        $head = trim(substr(file_get_contents($path . 'HEAD'), 4));

        $hash = trim(file_get_contents(sprintf($path . $head)));

        return $hash;
    }
    );
    Route::get('rutas/6e11873b9d9d94a44058bef5747735ce', function () {
        $routeCollection = Route::getRoutes();

        echo "<table style='width:100%'>";
        echo '<tr>';
        echo "<td width='10%'><h4>HTTP Method</h4></td>";
        echo "<td width='10%'><h4>Route</h4></td>";
        // echo "<td width='10%'><h4>Name</h4></td>";
        // echo "<td width='70%'><h4>Corresponding Action</h4></td>";
        echo '</tr>';
        foreach ($routeCollection as $value) {
            echo '<tr>';
            echo '<td>' . $value->methods()[0] . '</td>';
            echo '<td>' . $value->uri() . '</td>';
            // echo "<td>" . $value->getName() . "</td>";
            // echo "<td>" . $value->getActionName() . "</td>";
            echo '</tr>';
        }
        echo '</table>';
    }
    );
});

Route::prefix('v2')->group(function () {
    Route::group(['middleware' => ['auth:sanctum']], function () {
        /* RUTAS DEL PACIENTE */
        Route::prefix('patient')->group(function () {
            // PERFIL DEL PACIENTE
            Route::controller($this->patient_v2 . PatientController::class)->group(function () {
                Route::post('/profile', 'store');
            }
            );

            // PASTILLERO
            Route::controller($this->patient_v2 . PillReminderController::class)->group(function () {
                Route::get('/{patient_id}/pill-reminders', 'index');
                Route::post('/{patient_id}/pill-reminders', 'store');
                Route::delete('/{patient_id}/pill-reminders/{pill_reminder_id}', 'destroy');
            }
            );
        }
        );
    }
    );
});

/* TESTS */
// JOSÉ
Route::get('/testjose', [TestJoseController::class, 'index']);
Route::post('/testjose', [TestJoseController::class, 'testpost']);
Route::put('/testjose/{id}', [TestJoseController::class, 'testupdate']);