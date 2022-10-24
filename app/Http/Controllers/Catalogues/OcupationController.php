<?php

namespace App\Http\Controllers\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Models\Ocupation;
use Illuminate\Http\Request;
use Spatie\Permission\Contracts\Role;
use Illuminate\Support\Facades\DB;

class OcupationController extends Controller
{
    protected $user;

    public function __construct() {
        $this->user = auth()->user();
    }

    public function index()
    {
        try {
            if ($this->user->hasPermissionTo('show ocupations')) {
                $ocupation = Ocupation::paginate(5);
                return (Ocupation::collection($ocupation))->additional(['message' => 'ocupaciones encontradas']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {  
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(Request $request)
    {
        try {
            if ($this->user->hasPermissionTo('create ocupations')) {
                
                $ocupation = Ocupation::create(['name' => $request->name]);
                
                DB::commit();
                return (new Ocupation($ocupation))->additional(['message' => 'Ocupacion creada correctamente']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(Ocupation $ocupation)
    {
        try {
            if ($this->user->hasPermissionTo('show ocupations')) {
                return (new Ocupation($ocupation))->additional(['message' => 'Roles encontrados']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request, Ocupation $ocupation)
    {
        try {
            if ($this->user->hasPermissionTo('edit ocupations')) {
               
                $ocupation->name = $request->name;
                $ocupation->save();
            
                DB::commit();
                return (new RoleResource($ocupation))->additional(['message' => 'Ocupacion actualizada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(Ocupation $ocupation)
    {
        try {
            if ($this->user->hasPermissionTo('delete ocupations')) {
                $ocupation->delete();
                return response()->json(['message' => 'Ocupacion eliminada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
