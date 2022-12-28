<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\MedicalServiceUpdateRequest;
use App\Http\Resources\API\V1\Physician\MedicalServicePhysicianResource;
use App\Models\Physician;
use Illuminate\Support\Facades\DB;

class MedicalServiceController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->physician = Physician::where('user_id', auth()->id())->firstOrFail();

        $this->middleware('role:Physician');
    }

    public function index()
    {
        try {
            return $this->physician->medical_services;
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(MedicalServiceUpdateRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->physician->update($request->validated());

            if ($request->medical_services) {
                // SINCRONIZA LOS SERVICIOS MÉDICOS CON EL MÉDICO CORRESPONDIENTE
                $this->physician->medical_services()->sync($request->medical_services);
            }

            DB::commit();
            return (MedicalServicePhysicianResource::collection($this->physician->medical_service_physician))
                ->additional(['message' => 'Servicios del médico actualizado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

}
