<?php

namespace App\Http\Controllers\API\V1\Search;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Search\PhysicianSearchResource;
use App\Models\Physician;
use App\Models\PhysicianSpecialty;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PhysicianSearchController extends Controller
{
    public function index(Request $request)
    {
        // VARIABLES DE BÚSQUEDA
        $value = $request->value;
        $city = $request->city;

        // SI NO SE PROPORCIONA EL VALOR A BUSCAR
        if(!$value){
            return response()->json(['message' =>'Debe proporcionar el valor a buscar'], 503);
        }

        // FALTA AGREGAR LOS CONSULTORIOS
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

            case 'specialty':
                // BÚSQUEDA POR ESPECIALIDAD
                $physicians = Physician::where('is_verified', '=', 'verified')
                    ->join('physician_specialty', 'physicians.id', '=', 'physician_specialty.physician_id')
                    ->join('specialties', 'physician_specialty.specialty_id', '=', 'specialties.id')
                    ->select('physicians.*')
                    ->where('specialties.name', '=', $value)
                    ->paginate(10);
                if ($physicians->isEmpty()) {
                    return response()->json(['message' =>'Ningún resultado en la búsqueda'], 404);
                }
                return (PhysicianSearchResource::collection($physicians))->additional(['message' => 'Médico(s) encontrado(s).']);
                break;

            default:
                return response()->json(['message' =>'Faltan datos para generar la búsqueda'], 404);
                break;
        }
    }
}
