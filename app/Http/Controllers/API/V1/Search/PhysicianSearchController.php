<?php

namespace App\Http\Controllers\API\V1\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PhysicianSearchRequest;
use App\Http\Resources\API\V1\Search\PhysicianSearchResource;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class PhysicianSearchController extends Controller
{
    public function index(PhysicianSearchRequest $request)
    {
        try {
            // VARIABLES DE BÚSQUEDA
            $value = $request->value;
            $city_id = $request->city_id;

            switch ($request->search) {

                // BÚSQUEDA POR NOMBRE DEL MÉDICO
                case 'physician':
                    if ($city_id) {
                        $physicians = DB::select('CALL getPhysicianByIdAndCityIdOfFacility(?, ?)', [$value, $city_id]);
                    } else {
                        $physicians = DB::select('CALL getPhysicianById(?)', [$value]);
                    }
                    if (empty($physicians)) return  $this->withoutResults('Ningún resultado en la búsqueda');
                    return (PhysicianSearchResource::collection($physicians))->additional(['message' => 'Médico(s) encontrado(s).']);
                    break;

                // BÚSQUEDA POR ESPECIALIDAD
                case 'specialty':
                    if($city_id) {
                        $physicians = DB::select('CALL getPhysiciansByIdOfSpecialtyAndCityIdOfFacility(?, ?)', [$value, $city_id]);
                    } else {
                        $physicians = DB::select('CALL getPhysiciansByIdOfSpecialty(?)', [$value]);
                    }
                    if (empty($physicians)) return  $this->withoutResults('Ningún resultado en la búsqueda');
                    return (PhysicianSearchResource::collection($this->arrayPaginator($physicians, $request)))->additional(['message' => 'Médico(s) encontrado(s).']);
                    break;
                    
                // BÚSQUEDA POR ENFERMEDAD
                case 'disease':
                    if($city_id) {
                        $physicians = DB::select('CALL getPhysiciansByIdOfDiseaseAndCityIdOfFacility(?, ?)', [$value, $city_id]);
                    } else {
                        $physicians = DB::select('CALL getPhysiciansByIdOfDisease(?)', [$value]);
                    }
                    if (empty($physicians)) return  $this->withoutResults('Ningún resultado en la búsqueda');
                    return (PhysicianSearchResource::collection($this->arrayPaginator($physicians, $request)))->additional(['message' => 'Médico(s) encontrado(s).']);
                    break;

                // BÚSQUEDA POR SERVICIO
                case 'service':
                    if($city_id) {
                        $physicians = DB::select('CALL getPhysiciansByIdOfServiceAndCityIdOfFacility(?, ?)', [$value, $city_id]);
                    } else {
                        $physicians = DB::select('CALL getPhysiciansByIdOfService(?)', [$value]);
                    }
                    if (empty($physicians)) return  $this->withoutResults('Ningún resultado en la búsqueda');
                    return (PhysicianSearchResource::collection($this->arrayPaginator($physicians, $request)))->additional(['message' => 'Médico(s) encontrado(s).']);
                    break;

                // CUALQUIER OTRA BÚSQUEDA
                default:
                    return  $this->withoutResults('Datos incorrectos para generar la búsqueda');
                    break;
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function withoutResults($message) 
    {
        return response()->json(['message' => $message], 404);
    }

    public function arrayPaginator($array, $request)
    {
        $currentPage = 1;
        $perPage = 10;
        $currentElements = array_slice($array, $perPage * ($currentPage - 1), $perPage);
        return new LengthAwarePaginator($currentElements, count($array), $perPage, $currentPage, ['path' => $request->url()]);
    }
}
