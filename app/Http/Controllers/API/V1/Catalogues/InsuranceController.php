<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\InsuranceResource;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsuranceController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show insurances')->only([
            'index',
            'show',
        ]);
        $this->middleware('permission:create insurances')->only([
            'store',
        ]);
        $this->middleware('permission:edit medical services')->only([ // ?
            'update',
        ]);
        $this->middleware('permission:delete ocupations')->only([ //?
            'destroy',
        ]);
    }

    public function index()
    {
        try {
            $insurance = Insurance::paginate(5);

            return InsuranceResource::collection($insurance)->additional(['message' => 'Seguros medicos encontrados']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(Request $request)
    {
        try {
            $insurance = Insurance::create(['name' => $request->name]);

            return (new InsuranceResource($insurance))->additional(['message' => 'Seguros medicos creado correctamente']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Insurance $insurance)
    {
        try {
            return (new InsuranceResource($insurance))->additional(['message' => 'Servicios medicos encontrados']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request, Insurance $insurance)
    {
        try {
            $insurance->name = $request->name;
            $insurance->save();

            return (new InsuranceResource($insurance))->additional(['message' => 'Servicio medico actualizado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(Insurance $insurance)
    {
        try {
            $insurance->delete();

            return response()->json(['message' => 'Seguro medico eliminado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
