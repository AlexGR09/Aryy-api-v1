<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\StoreHereditaryBackgroundRequest;
use App\Http\Requests\API\V1\Physician\UpdateHereditaryBackgroundRequest;
use App\Http\Resources\API\V1\Patient\HereditaryBackgroundResource;
use App\Models\HereditaryBackground;
use App\Models\MedicalHistory;
use App\Models\Patient;

class HereditaryBackgroundController extends Controller
{
    public function store(StoreHereditaryBackgroundRequest $request)
    {
        $data = $request->validated();
        $hereditaryBackground = HereditaryBackground::create($data);

        MedicalHistory::where('patient_id', $data['patient_id'])
            ->update([
                'hereditary_background_id' => $hereditaryBackground->id,
            ]);

        return (new HereditaryBackgroundResource($hereditaryBackground))->additional(['message' => 'Informacion guardada con exito.']);
    }

    public function show(Patient $patient)
    {
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        if(empty($medicalHistory) || $medicalHistory->hereditarybackground()->exists() == false){
            return conflict('Este registro medico no tiene antecedentes hereditarios',[]);
        }
        return (new HereditaryBackgroundResource(
            $medicalHistory->hereditarybackground
        ))->additional(['message' => '..']);
    }

    public function update(Patient $patient, UpdateHereditaryBackgroundRequest $request)
    {
        $data = $request->validated();
        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        if(empty($medicalHistory) || $medicalHistory->hereditarybackground()->exists() == false){
            return conflict('Este registro medico no tiene antecedentes hereditarios',[]);
        }
        $medicalHistory->hereditarybackground()->update($data);
        return (new HereditaryBackgroundResource($medicalHistory->hereditarybackground))->additional(['message' => 'Informacion actualizada con exito.']);
    }
}
