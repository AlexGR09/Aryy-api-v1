<?php

namespace App\Http\Controllers\API\V1\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PhysicianSearchRequest;
use App\Http\Resources\API\V1\Search\PhysicianSearchResource;
use App\Models\Disease;
use App\Models\MedicalService;
use App\Models\Physician;
use App\Models\Specialty;
use Carbon\Carbon;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PhysicianSearchController extends Controller
{
    public function index(PhysicianSearchRequest $request)
    {
        try {
            $search = $request->search;
            $city = $request->city;
            $physicianQuery = Physician::query();

            $physicianQuery
            ->with(['score', 'facilitiesCoordinates', 'appointments'])
            ->select('id', 'user_id', 'professional_name')
            ->where(function ($query2) use ($search) {
                $query2->orWhereHas('specialties', function ($q) use ($search) {
                    $q->where('specialties.name', 'LIKE', '%'.$search.'%');
                });
                $query2->orWhereHas('medicalServices', function ($q) use ($search) {
                    $q->where('medical_services.name', 'LIKE', '%'.$search.'%');
                });
                $query2->orWhereHas('diseases', function ($q) use ($search) {
                    $q->where('diseases.name', 'LIKE', '%'.$search.'%');
                });
                $query2->orWhere('professional_name', 'LIKE', '%'.$search.'%');
            })
            ->whereHas('facilities.city', function ($query) use ($city) {
                $query->where('cities.name', 'LIKE', '%'.$city.'%');
            })
            ->withCount('comments');
            // $physicianQuery->whereHas('facilities');
            //basic info
            $physician = $physicianQuery->get();

            foreach ($physician as $key2 => $phy) {
                $currentDay = \Carbon\Carbon::now();

                $addConsultationLength = true;
                if ($currentDay->toDateTimeString() < $currentDay->copy()->setTime(9, 0, 0)->toDateTimeString()) {
                    $currentDay = $currentDay->copy()->setTime(9, 0, 0);
                    $addConsultationLength = false;
                }

                if ($currentDay->toDateTimeString() > $currentDay->copy()->setTime(21, 0, 0)->toDateTimeString()) {
                    $currentDay = $currentDay->addDay()->copy()->setTime(21, 0, 0);
                    $addConsultationLength = false;
                }

                $loop = true;

                while ($loop) {
                    $consultationLength = $physician[$key2]->facilities[0]->consultation_length;
                    $schedule = $physician[$key2]->facilities[0]->schedule;
                    $isAnAvailableDay = false;
                    $scheduleKey = 0;
                    while ($isAnAvailableDay === false) {
                        foreach ($schedule as $key => $availableDate) {
                            if ($availableDate->day == $currentDay->format('l')) {
                                $isAnAvailableDay = true;
                                $scheduleKey = $key;
                                break 2;
                            }
                        }
                        if (! $isAnAvailableDay) {
                            $currentDay->addDay();
                        }
                    }

                    $hours = explode(' a ', $schedule[$scheduleKey]->attention_time);
                    $restHours = explode(' a ', $schedule[$scheduleKey]->rest_hours);

                    $restStartHour = Carbon::parse($restHours[0]);
                    $restEndtHour = Carbon::parse($restHours[1]);

                    $startHour = Carbon::parse($hours[0]);
                    $endHour = Carbon::parse($hours[1]);
                    $startAppointmentDate = $currentDay->copy()->setTime($startHour->hour, $startHour->minute, 0)->toDateTimeString();
                    $endAppointmentDate = $currentDay->copy()->setTime($endHour->hour, $endHour->minute, 0)->toDateTimeString();
                    $restStartAppointmentDate = $currentDay->copy()->setTime($restStartHour->hour, $restStartHour->minute, 0)->toDateTimeString();
                    $restEndAppointmentDate = $currentDay->copy()->setTime($restEndtHour->hour, $restEndtHour->minute, 0)->toDateTimeString();
                    $availableDate = $physician[$key2]
                        ->appointments()
                        ->where('appointment_date', '>=', $startAppointmentDate)
                        ->where('appointment_date', '<=', $endAppointmentDate)
                        ->whereNotBetween('appointment_date', [$restStartAppointmentDate, $restEndAppointmentDate])
                        ->where(function ($query) use ($currentDay, $addConsultationLength, $consultationLength) {
                            $query->where('appointment_date', $currentDay);
                            if ($addConsultationLength) {
                                $query->orWhere('appointment_date', $currentDay->addMinutes($consultationLength));
                            }
                        })
                        ->first();

                    if (is_null($availableDate)) {
                        $physician[$key2]->available_appointment = $currentDay->format('Y-m-d');
                        $loop = false;
                        break;
                    }
                    // $currentDay->addDay();
                }
            }
            $physician = $physician->except(['appointments']);

            $specialtyQuery = Specialty::query();
            $specialtyQuery->when(! empty($city), fn ($q) => $q->whereHas('physicians.facilities.city', function ($query) use ($city) {
                $query->where('cities.name', 'LIKE', '%'.$city.'%');
            }));

            $specialtyQuery->where('specialties.name', 'LIKE', '%'.$search.'%');

            $specialities = $specialtyQuery->get();

            $diseaseyQuery = Disease::query();
            $diseaseyQuery->when(! empty($city), fn ($q) => $q->whereHas('physicians.facilities.city', function ($query) use ($city) {
                $query->where('name', 'LIKE', '%'.$city.'%');
            }));
            $diseaseyQuery->where('diseases.name', 'LIKE', '%'.$search.'%');

            $diseases = $diseaseyQuery->get();

            $medicalServiceQuery = MedicalService::query();
            $medicalServiceQuery->when(! empty($city), fn ($q) => $q->whereHas('physicians.facilities.city', function ($query) use ($city) {
                $query->where('name', 'LIKE', '%'.$city.'%');
            }));
            $medicalServiceQuery->select('id', 'name')
                ->where('name', 'LIKE', '%'.$search.'%');

            $medicalService = $medicalServiceQuery->get();

            return response()->json([
                'physician' => $physician,
                'specialities' => $specialities,
                'diseases' => $diseases,
                'medicalService' => $medicalService,
            ]);
            // VARIABLES DE BÚSQUEDA
            // $value = $request->value;
            // $city_id = $request->city_id;

            // switch ($request->search) {

            //     // BÚSQUEDA POR NOMBRE DEL MÉDICO
            //     case 'physician':
            //         if ($city_id) {
            //             $physicians = DB::select('CALL getPhysicianByIdAndCityIdOfFacility(?, ?)', [$value, $city_id]);
            //         } else {
            //             $physicians = DB::select('CALL getPhysicianById(?)', [$value]);
            //         }
            //         if (empty($physicians)) return  not_found('Ningún resultado en la búsqueda');
            //         return (PhysicianSearchResource::collection($physicians))->additional(['message' => 'Médico(s) encontrado(s).']);
            //         break;

            //     // BÚSQUEDA POR ESPECIALIDAD
            //     case 'specialty':
            //         if($city_id) {
            //             $physicians = DB::select('CALL getPhysiciansByIdOfSpecialtyAndCityIdOfFacility(?, ?)', [$value, $city_id]);
            //         } else {
            //             $physicians = DB::select('CALL getPhysiciansByIdOfSpecialty(?)', [$value]);
            //         }
            //         if (empty($physicians)) return  not_found('Ningún resultado en la búsqueda');
            //         return (PhysicianSearchResource::collection($this->arrayPaginator($physicians, $request)))->additional(['message' => 'Médico(s) encontrado(s).']);
            //         break;

            //     // BÚSQUEDA POR ENFERMEDAD
            //     case 'disease':
            //         if($city_id) {
            //             $physicians = DB::select('CALL getPhysiciansByIdOfDiseaseAndCityIdOfFacility(?, ?)', [$value, $city_id]);
            //         } else {
            //             $physicians = DB::select('CALL getPhysiciansByIdOfDisease(?)', [$value]);
            //         }
            //         if (empty($physicians)) return  not_found('Ningún resultado en la búsqueda');
            //         return (PhysicianSearchResource::collection($this->arrayPaginator($physicians, $request)))->additional(['message' => 'Médico(s) encontrado(s).']);
            //         break;

            //     // BÚSQUEDA POR SERVICIO
            //     case 'service':
            //         if($city_id) {
            //             $physicians = DB::select('CALL getPhysiciansByIdOfServiceAndCityIdOfFacility(?, ?)', [$value, $city_id]);
            //         } else {
            //             $physicians = DB::select('CALL getPhysiciansByIdOfService(?)', [$value]);
            //         }
            //         if (empty($physicians)) return  not_found('Ningún resultado en la búsqueda');
            //         return (PhysicianSearchResource::collection($this->arrayPaginator($physicians, $request)))->additional(['message' => 'Médico(s) encontrado(s).']);
            //         break;

            //     // CUALQUIER OTRA BÚSQUEDA
            //     default:
            //         return  not_found('Datos incorrectos para generar la búsqueda');
            //         break;
            // }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    // public function arrayPaginator($array, $request)
    // {
    //     $currentPage = 1;
    //     $perPage = 10;
    //     $currentElements = array_slice($array, $perPage * ($currentPage - 1), $perPage);
    //     return new LengthAwarePaginator($currentElements, count($array), $perPage, $currentPage, ['path' => $request->url()]);
    // }
}
