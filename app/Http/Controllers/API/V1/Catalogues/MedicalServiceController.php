<?php

namespace App\Http\Controllers\API\V1\Catalogues;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Catalogues\MedicalServiceResource;
use App\Http\Resources\API\V1\Catalogues\MedicalServicesSpecialtyResource;
use App\Models\MedicalService;
use App\Models\MedicalServicesSpecialty;
use App\Models\Specialty;
use Illuminate\Http\Request;

class MedicalServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('role_or_permission:User|show medical services')->only([
            'index',
            'show',
        ]);
        $this->middleware('permission:create medical services')->only([
            'store',
        ]);
        $this->middleware('permission:edit medical services')->only([
            'update',
        ]);
        $this->middleware('permission:delete ocupations')->only([
            'destroy',
        ]);
    }

    public function index()
    {
        try {
            return MedicalServiceResource::collection(MedicalService::orderBy('name')->get())
                ->additional(['message' => 'Servicios médicos encontrados.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(Request $request)
    {
        try {
            $medical_service = MedicalService::create(['name' => $request->name]);

            return (new MedicalServiceResource($medical_service))->additional(['message' => 'Servicio medico creada correctamente']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(MedicalService $medical_service)
    {
        try {
            return (new MedicalServiceResource($medical_service))->additional(['message' => 'Servicios medicos encontrados']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request, MedicalService $medical_service)
    {
        try {
            $medical_service->name = $request->name;
            $medical_service->save();

            return (new MedicalServiceResource($medical_service))->additional(['message' => 'Servicio medico actualizado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(MedicalService $medical_service)
    {
        try {
            $$medical_service->delete();

            return response()->json(['message' => 'Servicio medico eliminado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function medicalServicesSpecialty($specialty_id){

        $medicalServices_Specialty = MedicalServicesSpecialty::where('specialty_id', $specialty_id)->get();
        return MedicalServicesSpecialtyResource::collection($medicalServices_Specialty);
    }
}
