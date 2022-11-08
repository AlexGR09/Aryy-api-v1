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
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function index()
    {
        try {
            if ($this->user->hasPermissionTo('show occupations')) {
                $occupation = Occupation::paginate(5);
                return (OccupationResource::collection($occupation))->additional(['message' => 'ocupaciones encontradas']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(Request $request)
    {
        try {
            if ($this->user->hasPermissionTo('create occupations')) {
                $occupation = Occupation::create(['name' => $request->name]);

                DB::commit();
                return (new OccupationResource($occupation))->additional(['message' => 'Ocupacion creada correctamente']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Occupation $occupation)
    {
        try {
            if ($this->user->hasPermissionTo('show occupations')) {
                return (new OccupationResource($occupation))->additional(['message' => 'Ocupaciones encontradas']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request, Occupation $occupation)
    {
        try {
            if ($this->user->hasPermissionTo('edit occupations')) {
                $occupation->name = $request->name;
                $occupation->save();

                DB::commit();
                return (new OccupationResource($occupation))->additional(['message' => 'Ocupacion actualizada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(Occupation $occupation)
    {
        try {
            if ($this->user->hasPermissionTo('delete occupations')) {
                $occupation->delete();
                return response()->json(['message' => 'Ocupacion eliminada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
