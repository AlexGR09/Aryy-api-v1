<?php

namespace App\Http\Controllers\API\V1\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
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
            $physicians = DB::select('CALL getPhysiciansByNameWithSpecialties(?)', [$value]);

            // COINCIDENCIA DE NOMBRES DE MÉDICOS
            $specialties = DB::select('CALL getSpecialtiesByName(?)', [$value]);

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
}
