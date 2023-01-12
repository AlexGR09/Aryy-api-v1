<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\StoreHereditaryBackgroundRequest;
use App\Http\Requests\API\V1\Physician\UpdateHereditaryBackgroundRequest;
use App\Http\Resources\API\V1\Patient\HereditaryBackgroundResource;
use App\Models\HereditaryBackground;
use App\Models\MedicalHistory;
use App\Models\User;
use Illuminate\Http\Request;

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

    public function show(User $patient)
    {

        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        $hereditaryBackground = HereditaryBackground::where('id', $medicalHistory->hereditary_background_id)
            ->get();
        return (HereditaryBackgroundResource::collection($hereditaryBackground))->additional(['message' => '..']);
    }

    public function update(User $patient, UpdateHereditaryBackgroundRequest $request)
    {

        $medicalHistory = MedicalHistory::where('patient_id', $patient->id)->first();
        $hereditaryBackground = HereditaryBackground::where('id', $medicalHistory->hereditary_background_id)
            ->update($request->validated());
        return (new HereditaryBackgroundResource($hereditaryBackground))->additional(['message' => 'Informacion actualizada con exito.']);
    }
}
