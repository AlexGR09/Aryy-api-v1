<?php

namespace App\Http\Controllers;

use App\Http\Resources\API\V1\Search\PhysicianSearchResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestJoseController extends Controller
{
    public function index(Request $request)
    {
        try {
            // PARÁMETROS A UTILIZAR
            $value = $request->value;
            $resSearch = [
                'specialties' => [],
                'physicians' => []
            ];
            $message = 'Resultados de la búsqueda.';

            // OBTIENE MÉDICOS CON ESPECIALIDADES POR NOMBRE DEL MÉDICO
            $physicians = DB::select('CALL getPhysiciansWithSpecialtiesByPhysicianName(?)', [$value]);

            // COINCIDENCIA DE NOMBRES DE MÉDICOS
            $specialties = DB::select('CALL getSpecialtiesBySpecialtyName(?)', [$value]);

            // AGREGA AL ARRAY LOS RESULTADOS DE LA CONSULTAS
            $resSearch['specialties'] = $specialties;
            $resSearch['physicians'] = $physicians;

            if (empty($resSearch['specialties']) == TRUE && empty($resSearch['physicians']) == TRUE ) {
                $message = 'Sin resultados para esta búsqueda.';
            }
            return response()->json([
                'data' => $resSearch, 
                'message' => $message 
            ]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
      
    // if ($request->city_id) {
    //     $physicians = DB::select('CALL searchPhysiciansByNameAndCityId(?, ?)', [$request->value, $request->city_id]);
    // } else {
    //     $physicians = DB::select('CALL searchPhysiciansByName(?)', [$request->value]);
    // }

    // return (PhysicianSearchResource::collection($physicians))->additional(['message' => 'Médico(s) encontrado(s).']);
}
