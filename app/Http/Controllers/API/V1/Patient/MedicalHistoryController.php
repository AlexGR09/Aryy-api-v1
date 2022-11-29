<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\MedicalHistoryRequest;
use App\Http\Resources\API\V1\Patient\MedicalHistoryResoucer;
use App\Models\AllergyPatient;
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

    public function store(MedicalHistoryRequest $request)
    {
        try {
            if ($this->user->hasRole('Patient')) {
            $patient = Patient::where('user_id',$this->user->id)->first();
            
                DB::beginTransaction();
                $allergy_patient = new AllergyPatient();
                $allergy_patient->food_allergy= $request->food_allergy;
                $allergy_patient->drug_allergy = $request->drug_allergy;
                $allergy_patient->environmental_allergy = $request->environmental_allergy;
                $allergy_patient->save();

                $basic_information = new MedicalHistory();
                $weight=json_decode($basic_information->weight);
                $height=json_decode($basic_information->height);
                
                $basic_information->patient_id = $patient->id;
                $basic_information->weight =json_encode($request->weight);
                $basic_information->height = json_encode($request->height);
                $basic_information->imc = round((float)$weight->weight/pow((float)$height->height,2));
                $basic_information->blood_type = $request->blood_type;
                $basic_information->allergy_patient_id = $allergy_patient->id;
                
                $basic_information->save();
                DB::commit();
                return (new MedicalHistoryResoucer($basic_information))->additional(['message' => 'Informacion basica guardada con exito.']);
            }
                return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        
            } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request){
        try {
            if ($this->user->hasRole('Patient')) {
            $patient = Patient::where('user_id',$this->user->id)->first();
            
               
                $basic_information = MedicalHistory::where('patient_id',$patient->id)->first();
                $weight=json_decode($basic_information->weight);
                $height=json_decode($basic_information->height);
                
                $basic_information->patient_id = $patient->id;
                $basic_information->weight = json_encode($request->weight);
                $basic_information->height = json_encode($request->height);
                $basic_information->imc = round((float)$weight->weight/pow((float)$height->height,2));
                $basic_information->blood_type = $request->blood_type;
                $basic_information->save();

                $allergy_patient = AllergyPatient::where('id',$basic_information->allergy_patient_id)->first();
                $allergy_patient->food_allergy= $request->food_allergy;
                $allergy_patient->drug_allergy = $request->drug_allergy;
                $allergy_patient->environmental_allergy = $request->environmental_allergy;
                $allergy_patient->save();
               
                return (new MedicalHistoryResoucer($basic_information))->additional(['message' => 'La informacion basica se actualizo con exito.']);
            }
                return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        
            } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show(){
        try {
            if ($this->user->hasRole('Patient')) {
                $patient = Patient::where('user_id',$this->user->id)->first();
                $medical_history = MedicalHistory::where('patient_id',$patient->id)->with('allergypatient')->get();
                //return $medical_history;
                
                return (MedicalHistoryResoucer::collection($medical_history))->additional(['message' => '..']);
                //return (new MedicalHistoryResoucer($medical_history))->additional(['message' => 'La informacion basica se actualizo con exito.']);
            }
                return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        
            } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy(){
        try {
            if ($this->user->hasRole('Patient')) {
                $patient = Patient::where('user_id',$this->user->id)->first();
                $medical_history = MedicalHistory::where('patient_id',$patient->id)->with('allergypatient')->first();
                 
                $medical_history->height = json_encode(NULL);
                $medical_history->weight = json_encode(NULL);
                $medical_history->imc = NULL;
                $medical_history->blood_type = NULL;
                $medical_history->save();
                return$medical_history;
                //return (new ($this->user))->additional(['message' => 'Usuario eliminado con éxito, adiós.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
