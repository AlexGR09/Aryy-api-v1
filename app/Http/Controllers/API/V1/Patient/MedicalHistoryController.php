<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\MedicalHistoryRequest;
use App\Http\Resources\API\V1\Patient\BasicInformationResource;
use App\Http\Resources\API\V1\Patient\MedicalHistoryResource;
use App\Models\AllergyPatient;
use App\Models\MedicalHistory;
use App\Models\Patient;
use Illuminate\Support\Facades\DB;

class MedicalHistoryController extends Controller
{
    public ?\Illuminate\Contracts\Auth\Authenticatable $user;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->middleware('role:Patient')->only([
            'index',
            'update',
            'store',
            'show',
        ]);
    }

    public function index()
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();
            $medical_history = MedicalHistory::where('patient_id', $patient->id)->with('allergypatient')->get();
            return (MedicalHistoryResource::collection($medical_history))->additional(['message' => '..']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(MedicalHistoryRequest $request)
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();

            DB::beginTransaction();
            $allergy_patient = AllergyPatient::create([
                'food_allergy' => $request->food_allergy,
                'drug_allergy' => $request->drug_allergy,
                'environmental_allergy' => $request->environmental_allergy,
            ]);

            $basic_information = new MedicalHistory();
            $basic_information->patient_id = $patient->id;
            $basic_information->weight = $request->weight;
            $basic_information->height = $request->height;
            
            $weight = $basic_information->weight;
            $height = $basic_information->height;

            $basic_information->imc = round((float) $weight->weight / ((float) $height->height) ** 2);
            $basic_information->blood_type = $request->blood_type;
            $basic_information->allergy_patient_id = $allergy_patient->id;

            $basic_information->save();
            DB::commit();
<<<<<<< HEAD
            return (new BasicInformationResource($basic_information))->additional(['message' => 'Informacion basica guardada con exito.']);
=======

            return (new MedicalHistoryResource($basic_information))->additional(['message' => 'Informacion basica guardada con exito.']);
>>>>>>> Jorge
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(MedicalHistoryRequest $request)
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();
            $basic_information = MedicalHistory::where('patient_id', $patient->id)->first();

            $basic_information->patient_id = $patient->id;
<<<<<<< HEAD
            $basic_information->weight = $request->weight;
            $basic_information->height = $request->height;

            $weight = $basic_information->weight;
            $height = $basic_information->height;
            
            $basic_information->imc = round((float)$weight->weight / pow((float)$height->height, 2));
=======
            $basic_information->weight = json_encode($request->weight, JSON_THROW_ON_ERROR);
            $basic_information->height = json_encode($request->height, JSON_THROW_ON_ERROR);

            $weight = json_decode($basic_information->weight, null, 512, JSON_THROW_ON_ERROR);
            $height = json_decode($basic_information->height, null, 512, JSON_THROW_ON_ERROR);

            $basic_information->imc = round((float) $weight->weight / ((float) $height->height) ** 2);
>>>>>>> Jorge
            $basic_information->blood_type = $request->blood_type;
            $basic_information->save();

            $allergy_patient = AllergyPatient::where('id', $basic_information->allergy_patient_id)->first();
            $allergy_patient->food_allergy = $request->food_allergy;
            $allergy_patient->drug_allergy = $request->drug_allergy;
            $allergy_patient->environmental_allergy = $request->environmental_allergy;
            $allergy_patient->save();

            return (new BasicInformationResource($basic_information))->additional(['message' => 'La informacion basica se actualizo con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();
            $medical_history = MedicalHistory::where('patient_id', $patient->id)->with('allergypatient')->get();
<<<<<<< HEAD
            return (BasicInformationResource::collection($medical_history))->additional(['message' => '..']);
=======

            return BasicInformationResource::collection($medical_history)->additional(['message' => '..']);
>>>>>>> Jorge
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
