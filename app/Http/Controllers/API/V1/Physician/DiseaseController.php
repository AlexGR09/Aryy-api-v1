<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\DiseaseIdRequest;
use App\Http\Resources\API\V1\Catalogues\DiseaseResource;
use App\Models\Physician;

class DiseaseController extends Controller
{

    public function __construct()
    {
        $this->middleware('role:Physician');
    }

    public function index() 
    {
        try {
            $physician = Physician::where('user_id', auth()->id())->firstOrFail();

            return (DiseaseResource::collection($physician->diseases))
                ->additional(['message' => 'Enfermedades que atiende el médico.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(DiseaseIdRequest $request)
    {
        try {
            $physician = Physician::where('user_id', auth()->id())->firstOrFail();

            // GUARDA ENFERMEDAD EN LA TABLA PIVOTE DISEASE-PHYSICIAN SIN DUPLICADOS
            $physician->diseases()->syncWithoutDetaching($request->disease_id);

            return (DiseaseResource::collection($physician->diseases))
                ->additional(['message' => 'Enfermedades que atiende el médico actualizado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(DiseaseIdRequest $request)
    {
        try {
            $physician = Physician::where('user_id', auth()->id())->firstOrFail();

            // ELIMINA LA RELACIÓN DE DISEASE-PHYSICIAN DEL MÉDICO CORRESPONDIENTE
            $physician->diseases()->detach($request->disease_id);

            return (DiseaseResource::collection($physician->diseases))
                ->additional(['message' => 'Enfermedades que atiende el médico actualizado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
    
}
