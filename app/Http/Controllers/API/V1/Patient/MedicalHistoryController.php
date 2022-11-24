<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\MedicalHistoryRequest;
use App\Http\Resources\API\V1\Patient\MedicalHistoryResoucer;
use App\Models\AllergiePatient;
use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class MedicalHistoryController extends Controller
{
    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function basic_information(MedicalHistoryRequest $request)
    {
        try {
            if ($this->user->hasRole('Patient')) {
            $patient = Patient::where('user_id',$this->user->id)->first();
            
                DB::beginTransaction();
                $basic_information = new MedicalHistory();
                $basic_information->patient_id = $patient->id;
                $basic_information->weight = $request->weight;
                $basic_information->height = $request->height;
                $basic_information->imc = round((float)$request->weight/pow((float)$request->height,2));
                $basic_information->blood_type = $request->blood_type;
                $basic_information->save();

                $allergy_patient = new AllergiePatient();
                $allergy_patient->food_allergy= $request->food_allergy;
                $allergy_patient->drug_allergy = $request->drug_allergy;
                $allergy_patient->environmental_allergy = $request->environmental_allergy;
                $allergy_patient->save();
                DB::commit();
                return (new MedicalHistoryResoucer($basic_information))->additional(['message' => 'Informacion basica guardada con exito.']);
            }
                return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        
            } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
