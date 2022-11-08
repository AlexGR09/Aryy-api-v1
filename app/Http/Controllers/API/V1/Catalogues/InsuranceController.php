<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\InsuranceResource;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InsuranceController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function index()
    {
        try {
            if ($this->user->hasPermissionTo('show insurances')) {
                $insurance = Insurance::paginate(5);
                return (InsuranceResource::collection($insurance))->additional(['message' => 'Seguros medicos encontrados']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(Request $request)
    {
        try {
            if ($this->user->hasPermissionTo('create insurances')) {
                $insurance = Insurance::create(['name' => $request->name]);

                DB::commit();
                return (new InsuranceResource($insurance))->additional(['message' => 'Seguros medicos creado correctamente']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Insurance $insurance)
    {
        try {
            if ($this->user->hasPermissionTo('show insurances')) {
                return (new InsuranceResource($insurance))->additional(['message' => 'Servicios medicos encontrados']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request, Insurance $insurance)
    {
        try {
            if ($this->user->hasPermissionTo('edit medical services')) {
                $insurance->name = $request->name;
                $insurance->save();

                DB::commit();
                return (new InsuranceResource($insurance))->additional(['message' => 'Servicio medico actualizado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(Insurance $insurance)
    {
        try {
            if ($this->user->hasPermissionTo('delete ocupations')) {
                $insurance->delete();
                return response()->json(['message' => 'Seguro medico eliminado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
