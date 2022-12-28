<?php

namespace App\Http\Controllers\API\V1\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PhysicianSearchRequest;
use App\Http\Resources\API\V1\Search\PhysicianSearchResource;
use App\Models\Disease;
use App\Models\MedicalService;
use App\Models\Physician;
use App\Models\Specialty;
use Illuminate\Database\Eloquent\Builder;
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
            $physicianQuery->when(!empty($city), fn ($q) => $q->whereHas('facilities.city', function (Builder $query) use ($city) {
                $query->where('cities.name', 'LIKE', '%' . $city . '%');
            }));

            $physicianQuery->with(['score', 'facilitiesCoordinates', 'appointments'])->withCount('comments')->select('id', 'user_id', 'professional_name')
                ->where('professional_name', 'LIKE', '%' . $search . '%');

            //basic info 
            $physician = $physicianQuery->get();

            $currentDay = now();
            return now();

            $addConsultationLength = true;
            if ($currentDay->toDateTimeString() < $currentDay->setTime(9, 0, 0)->toDateTimeString()) {
                $currentDay = $currentDay->setTime(9, 0, 0);

                $addConsultationLength = false;
                return 'hola';
            }

            if ($currentDay->toDateTimeString() > $currentDay->setTime(21, 0, 0)->toDateTimeString()) {
                $currentDay = $currentDay->addDay()->setTime(21, 0, 0);
                $addConsultationLength = false;
                return 'hola3';

            }
            foreach ($physician as $key => $phy) {


                $loop = true;
                while ($loop) {
                    $availableDate = $physician[$key]->appointments()->where('appointment_date', '>=', $currentDay->setTime(9, 0, 0))
                        ->orWhere('appointment_date', '<=', $currentDay->setTime(21, 0, 0))
                        ->where(function ($query) use($currentDay, $addConsultationLength){
                            $query->where('appointment_date', $currentDay);
                            if($addConsultationLength){
                                $query->orWhere('appointment_date', $currentDay->addHour());
                            }
                        })
                        ->first();
                    // return $availableDate;
                    if (is_null($availableDate)) {
                        $physician[$key]->available_appointment = $currentDay->format('Y-m-d');
                        $loop = false;
                    }
                    $currentDay->addDay();
                }
            }
            $physician = $physician->except(['appointments']);

            $specialtyQuery = Specialty::query();
            $specialtyQuery->when(!empty($city), fn ($q) => $q->whereHas('physicians.facilities.city', function (Builder $query) use ($city) {
                $query->where('name', 'LIKE', '%' . $city . '%');
            }));
            $specialtyQuery->where('specialties.name', 'LIKE', '%' . $search . '%');

            $specialities = $specialtyQuery->get();

            $diseaseyQuery = Disease::query();
            $diseaseyQuery->when(!empty($city), fn ($q) => $q->whereHas('physicians.facilities.city', function (Builder $query) use ($city) {
                $query->where('name', 'LIKE', '%' . $city . '%');
            }));
            $diseaseyQuery->where('diseases.name', 'LIKE', '%' . $search . '%');

            $diseases = $diseaseyQuery->get();

            $medicalServiceQuery = MedicalService::query();
            $medicalServiceQuery->when(!empty($city), fn ($q) => $q->whereHas('physicians.facilities.city', function (Builder $query) use ($city) {
                $query->where('name', 'LIKE', '%' . $city . '%');
            }));
            $medicalServiceQuery->select('id', 'name')
                ->where('name', 'LIKE', '%' . $search . '%');

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
