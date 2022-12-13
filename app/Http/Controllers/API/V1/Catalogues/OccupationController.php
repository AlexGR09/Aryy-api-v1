<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\OccupationResource;
use App\Http\Resources\RoleResource;
use App\Models\Occupation;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;
use Illuminate\Support\Facades\DB;

class OccupationController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:show occupations')->only([
            'index',
            'show',
        ]);
        $this->middleware('permission:create occupations')->only([
            'create',
        ]);
        $this->middleware('permission:edit occupations')->only([
            'update'
        ]);
        $this->middleware('permission:delete occupations')->only([
            'destroy'
        ]);
    }

    public function index()
    {
        try {
            $occupation = Occupation::paginate(5);
            return (OccupationResource::collection($occupation))->additional(['message' => 'ocupaciones encontradas']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(Request $request)
    {
        try {
            $occupation = Occupation::create(['name' => $request->name]);
            return (new OccupationResource($occupation))->additional(['message' => 'Ocupacion creada correctamente']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Occupation $occupation)
    {
        try {
            return (new OccupationResource($occupation))->additional(['message' => 'Ocupaciones encontradas']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request, Occupation $occupation)
    {
        try {
            $occupation->name = $request->name;
            $occupation->save();
            return (new OccupationResource($occupation))->additional(['message' => 'Ocupacion actualizada con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(Occupation $occupation)
    {
        try {
            $occupation->delete();
            return response()->json(['message' => 'Ocupacion eliminada con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
