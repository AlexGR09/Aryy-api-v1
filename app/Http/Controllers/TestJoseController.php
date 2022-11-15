<?php

namespace App\Http\Controllers;

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

        $consulta = DB::select(DB::raw('CALL searchPhysiciansByName(?)', [$request->value]))->paginate(12);   

        $data = DB::select(DB::raw('CALL hardik("hari")'))->paginate(5); 

        // $consulta = DB::select('CALL searchPhysiciansByName(?)', [$request->value]);
        // $result = collect($consulta);

        return response()->json($consulta);
    }

}
