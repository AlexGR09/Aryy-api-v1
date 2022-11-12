<?php

namespace App\Http\Controllers\API\V1\Search;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PhysicianSearchRequest;
use App\Http\Resources\API\V1\Search\PhysicianSearchResource;
use App\Models\Physician;
// use App\Models\PhysicianSpecialty;
// use App\Models\Specialty;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\DB;

class PhysicianSearchController extends Controller
{
    public function index(PhysicianSearchRequest $request)
    {
        // VARIABLES DE BÚSQUEDA
        $value = $request->value;
        $city_id = $request->city_id;

        try {
            switch ($request->search) {
                // BÚSQUEDA POR NOMBRE DEL MÉDICO
                case 'physician':
                    $physicians = Physician::where('professional_name', 'like', '%'.$value.'%')
                        ->where('is_verified', 'verified')
                        ->paginate(10);
                    if ($physicians->isEmpty()) {
                        return response()->json(['message' =>'Ningún resultado en la búsqueda'], 404);
                    }
                    return (PhysicianSearchResource::collection($physicians))->additional(['message' => 'Médico(s) encontrado(s).']);
                    break;
                // BÚSQUEDA POR ESPECIALIDAD
                case 'specialty':
                    // BÚSQUEDA CON CIUDAD
                    if($city_id) {
                        $physicians = Physician::where('is_verified', '=', 'verified')
                            ->join('physician_specialty', 'physicians.id', '=', 'physician_specialty.physician_id')
                            ->join('specialties', 'physician_specialty.specialty_id', '=', 'specialties.id')
                            ->join('facility_physician', 'physicians.id', '=', 'facility_physician.physician_id')
                            ->join('facilities', 'facility_physician.facility_id', '=', 'facilities.id')
                            ->where('specialties.name', '=', $value)
                            ->where('facilities.city_id', '=', $city_id)
                            ->select('physicians.*', 'facilities.city_id as city')
                            ->groupBy('physicians.id', 'city')
                            ->paginate(10);
                    // BUSCA SIN CIUDAD
                    } else {
                        $physicians = Physician::where('is_verified', '=', 'verified')
                            ->join('physician_specialty', 'physicians.id', '=', 'physician_specialty.physician_id')
                            ->join('specialties', 'physician_specialty.specialty_id', '=', 'specialties.id')
                            ->select('physicians.*')
                            ->where('specialties.name', '=', $value)
                            ->paginate(10);
                    }
                    if ($physicians->isEmpty()) {
                        return response()->json(['message' =>'Ningún resultado en la búsqueda'], 404);
                    }
                    return (PhysicianSearchResource::collection($physicians))->additional(['message' => 'Médico(s) encontrado(s).']);
                    break;
                // BÚSQUEDA POR ENFERMEDAD
                case 'disease':
                    // BÚSQUEDA CON CIUDAD
                    if($city_id) {
                        $physicians = Physician::where('is_verified', '=', 'verified')
                            ->join('disease_physician', 'physicians.id', '=', 'disease_physician.physician_id')
                            ->join('diseases', 'disease_physician.disease_id', '=', 'diseases.id')
                            ->join('facility_physician', 'physicians.id', '=', 'facility_physician.physician_id')
                            ->join('facilities', 'facility_physician.facility_id', '=', 'facilities.id')
                            ->where('diseases.name', '=', $value)
                            ->where('facilities.city_id', '=', $city_id)
                            ->select('physicians.*', 'facilities.city_id as city')
                            ->groupBy('physicians.id', 'city')
                            ->paginate(10);
                    // BUSCA SIN CIUDAD
                    } else {
                        $physicians = Physician::where('is_verified', '=', 'verified')
                            ->join('disease_physician', 'physicians.id', '=', 'disease_physician.physician_id')
                            ->join('diseases', 'disease_physician.disease_id', '=', 'diseases.id')
                            ->select('physicians.*')
                            ->where('diseases.name', '=', $value)
                            ->paginate(10);
                    }
                    
                    if ($physicians->isEmpty()) {
                        return response()->json(['message' =>'Ningún resultado en la búsqueda'], 404);
                    }
                    return (PhysicianSearchResource::collection($physicians))->additional(['message' => 'Médico(s) encontrado(s).']);
                    break;
                // BÚSQUEDA POR SERVICIO
                case 'service':
                    // BÚSQUEDA CON CIUDAD
                    if($city_id) {
                        $physicians = Physician::where('is_verified', '=', 'verified')
                            ->join('medical_service_physician', 'physicians.id', '=', 'medical_service_physician.physician_id')
                            ->join('medical_services', 'medical_service_physician.medical_service_id', '=', 'medical_services.id')
                            ->join('facility_physician', 'physicians.id', '=', 'facility_physician.physician_id')
                            ->join('facilities', 'facility_physician.facility_id', '=', 'facilities.id')
                            ->where('medical_services.name', '=', $value)
                            ->where('facilities.city_id', '=', $city_id)
                            ->select('physicians.*', 'facilities.city_id as city')
                            ->groupBy('physicians.id', 'city')
                            ->paginate(10);
                    // BUSCA SIN CIUDAD
                    } else {
                        $physicians = Physician::where('is_verified', '=', 'verified')
                            ->join('medical_service_physician', 'physicians.id', '=', 'medical_service_physician.physician_id')
                            ->join('medical_services', 'medical_service_physician.medical_service_id', '=', 'medical_services.id')
                            ->select('physicians.*')
                            ->where('medical_services.name', '=', $value)
                            ->paginate(10);
                    }
                    if ($physicians->isEmpty()) {
                        return response()->json(['message' =>'Ningún resultado en la búsqueda'], 404);
                    }
                    return (PhysicianSearchResource::collection($physicians))->additional(['message' => 'Médico(s) encontrado(s).']);
                    break;
                // CUALQUIER OTRA BÚSQUEDA
                default:
                    return response()->json(['message' =>'Faltan datos para generar la búsqueda'], 404);
                    break;
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
