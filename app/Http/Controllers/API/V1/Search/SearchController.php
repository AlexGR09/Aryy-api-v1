<?php

namespace App\Http\Controllers\API\V1\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        try {
            // PARÁMETROS A UTILIZAR
            $value = $request->value;

            // OBTIENE MÉDICOS CON ESPECIALIDADES POR NOMBRE DEL MÉDICO
            $physicians = DB::select('CALL getPhysiciansByNameWithSpecialties(?)', [$value]);

            // COINCIDENCIA DE NOMBRES DE MÉDICOS
            $specialties = DB::select('CALL getSpecialtiesByName(?)', [$value]);

            // AGREGA AL ARRAY LOS RESULTADOS DE LA CONSULTAS Y LOS PAGINA
            $result = array_merge($specialties, $physicians);
            $data = $this->arrayPaginator($result, $request);

            if (empty($specialties) == true && empty($physicians) == true) {
                return response()->json(['message' => 'Sin resultados para esta búsqueda.']);
            }
            return response()->json($data);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function arrayPaginator($array, $request)
    {
        $page = request('page') ? request('page') - 1 : 0;
        $perPage = 10;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(
            array_slice($array, $offset, $perPage, true),
            count($array),
            $perPage,
            $page,
            ['path' => $request->url(), 'query' => $request->query()]
        );
    }
}
