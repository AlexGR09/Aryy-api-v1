<?php

namespace App\Http\Controllers;

use App\Http\Resources\API\V1\Search\PhysicianSearchResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestJoseController extends Controller
{
    public function index(Request $request) 
    {

        // $page = request('page', 1);
        // $pageSize = 10;
        // $results = DB::select('CALL searchPhysiciansByName(?)', [$request->value]);
        // $offset = ($page * $pageSize) - $pageSize;
        // $data = array_slice($results, $offset, $pageSize, true);
        // $paginator = new \Illuminate\Pagination\LengthAwarePaginator($data, count($data), $pageSize, $page);
        // $paginator->setPath(request('url'));


        // $facilities = DB::select('CALL searchFacilitiesByPhysicianId(?)', [10]);

        // if (empty($facilities)) {
        //     return "vacio";
        // }

        // return $facilities;
         // return response()->json($consulta);

        //  physicians = DB::table('physicians')
        //         ->join('facility_physician', 'physicians.id', '=', 'facility_physician.physician_id')
        //         ->join('facilities', 'facility_physician.facility_id', '=', 'facilities.id')
        //         ->where('physicians.professional_name', 'like', '%'.$request->value.'%')
        //         ->where('facilities.city_id', '=', $request->city_id)
        //         ->select('physicians.*', 'facilities.city_id as city_id')
        //         ->groupBy('physicians.id', 'city_id')
        //         ->orderBy('physicians.professional_name', 'ASC')
        //         ->get();
        //     return response()->json($physicians);
        

        if ($request->city_id) {
            $physicians = DB::select('CALL searchPhysiciansByNameAndCityId(?, ?)', [$request->value, $request->city_id]);
        } else {
            $physicians = DB::select('CALL searchPhysiciansByName(?)', [$request->value]);
        }
        
        return (PhysicianSearchResource::collection($physicians))->additional(['message' => 'Médico(s) encontrado(s).']);
       
    }

}
