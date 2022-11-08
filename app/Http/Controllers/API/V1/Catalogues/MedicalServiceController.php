<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\MedicalServiceResource;
use App\Models\MedicalService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MedicalServiceController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function index()
    {
        try {
            if ($this->user->hasPermissionTo('show medical services')) {
                $medical_service = MedicalService::paginate(5);
                return (MedicalServiceResource::collection($medical_service))->additional(['message' => 'Servicios medicos encontrados']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(Request $request)
    {
        try {
            if ($this->user->hasPermissionTo('create medical services')) {
                $medical_service = MedicalService::create(['name' => $request->name]);

                DB::commit();
                return (new MedicalServiceResource($medical_service))->additional(['message' => 'Servicio medico creada correctamente']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(MedicalService $medical_service)
    {
        try {
            if ($this->user->hasPermissionTo('show ocupations')) {
                return (new MedicalServiceResource($medical_service))->additional(['message' => 'Servicios medicos encontrados']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request, MedicalService $medical_service)
    {
        try {
            if ($this->user->hasPermissionTo('edit medical services')) {
                $medical_service->name = $request->name;
                $medical_service->save();

                DB::commit();
                return (new MedicalServiceResource($medical_service))->additional(['message' => 'Servicio medico actualizado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(MedicalService $medical_service)
    {
        try {
            if ($this->user->hasPermissionTo('delete ocupations')) {
                $$medical_service->delete();
                return response()->json(['message' => 'Servicio medico eliminado con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
