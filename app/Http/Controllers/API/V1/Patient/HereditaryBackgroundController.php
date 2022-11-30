<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\HereditaryBackgroundRequest;
use App\Http\Resources\API\V1\Patient\HereditaryBackgroundResource;
use App\Models\HereditaryBackground;
use App\Models\MedicalHistory;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class HereditaryBackgroundController extends Controller
{
    
    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('permission:show hereditary background')->only(['show']);
        $this->middleware('role:Patient')->only(['store']);
        $this->middleware('permission:edit hereditary background')->only(['update']);
    }

    public function index()
    {
        //
    }

    public function store(HereditaryBackgroundRequest $request)
    {
        try {
            /* if ($this->user->hasRole('Patient')) { */
            
                DB::beginTransaction();     
                $patient = Patient::where('user_id', $this->user->id)->first();
           
                $hereditary_background = new HereditaryBackground();
                $hereditary_background->diabetes = json_encode($request->diabetes);
                $hereditary_background->heart_diseases = json_encode($request->heart_diseases);
                $hereditary_background->blood_pressure = json_encode($request->blood_pressure);
                $hereditary_background->thyroid_diseases = json_encode($request->thyroid_diseases);
                $hereditary_background->cancer = json_encode($request->cancer);
                $hereditary_background->kidney_stones = json_encode($request->kidney_stones);
                $hereditary_background->save();
                
                $medical_history = MedicalHistory::where('patient_id', $patient->id)->first();
                $medical_history->hereditary_background_id = $hereditary_background->id;
                $medical_history->save();

                DB::commit();
                return (new HereditaryBackgroundResource($hereditary_background))->additional(['message' => 'Informacion guardada con exito.']);
            /* }
                return response()->json(['message' => 'No puedes realizar esta acción.'], 403); */
        
            } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            /* if ($this->user->hasRole('Patient')) { */
            
                DB::beginTransaction();                
                $patient = Patient::where('user_id', $this->user->id)->first();
                $medical_history = MedicalHistory::where('patient_id', $patient->id)->first();

                $hereditary_background = HereditaryBackground::where('id', $medical_history->hereditary_background_id)->get();

                DB::commit();
                return (HereditaryBackgroundResource::collection($hereditary_background))->additional(['message' => 'Mi perfil de paciente.']);

                //return (new HereditaryBackgroundResource($hereditary_background))->additional(['message' => '..']);
            /* }
                return response()->json(['message' => 'No puedes realizar esta acción.'], 403); */
        
            } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request)
    {
        try {

            $patient = Patient::where('user_id', $this->user->id)->first();
            $medical_history = MedicalHistory::where('patient_id', $patient->id)->first();
            $hereditary_background = HereditaryBackground::where('id', $medical_history->hereditary_background_id)->first();

            /* if ($this->user->hasRole('Patient')) { */

                DB::beginTransaction();
                $hereditary_background->diabetes = json_encode($request->diabetes);
                $hereditary_background->heart_diseases = json_encode($request->heart_diseases);
                $hereditary_background->blood_pressure = json_encode($request->blood_pressure);
                $hereditary_background->thyroid_diseases = json_encode($request->thyroid_diseases);
                $hereditary_background->cancer = json_encode($request->cancer);
                $hereditary_background->kidney_stones = json_encode($request->kidney_stones);
                $hereditary_background->save();
                

                DB::commit();
                return (new HereditaryBackgroundResource($hereditary_background))->additional(['message' => 'Informacion actualizada con exito.']);
            /* } */
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

}
