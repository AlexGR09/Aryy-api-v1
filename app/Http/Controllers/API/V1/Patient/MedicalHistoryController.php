<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\MedicalHistoryRequest;
use App\Http\Resources\API\V1\Catalogues\AllergyResource;
use App\Http\Resources\API\V1\Catalogues\BloodTypeResource;
use App\Http\Resources\API\V1\Patient\BasicInformationResource;
use App\Http\Resources\API\V1\Patient\MedicalHistoryResource;
use App\Models\Allergy;
use App\Models\AllergyPatient;
use App\Models\BloodType;
use Illuminate\Http\Request;
use App\Models\MedicalHistory;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class MedicalHistoryController extends Controller
{
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

    public function index($id)
    {
        try {
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();
            $medical_history = MedicalHistory::where('patient_id', $patient->id)->with('allergypatient')->get();
            return (MedicalHistoryResource::collection($medical_history))->additional(['message' => '..']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
    public function store(MedicalHistoryRequest $request, $id)
    {
        try {
            DB::beginTransaction();
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $allergy_patient = AllergyPatient::create([
                'food_allergy' =>  $request->food_allergy,
                'drug_allergy' => $request->drug_allergy,
                'environmental_allergy' => $request->environmental_allergy,
            ]);

            $basic_information = MedicalHistory::where('patient_id', $patient->id)->first();
            $basic_information->patient_id = $patient->id;
            $basic_information->weight = $request->weight;
            $basic_information->height = $request->height;

            $weight = $basic_information->weight;
            $height = $basic_information->height;

            $basic_information->imc = round((float)$weight->weight / pow((float)$height->height, 2));
            $basic_information->blood_type = $request->blood_type;
            $basic_information->allergy_patient_id = $allergy_patient->id;

            $basic_information->save();
            DB::commit();
            return (new BasicInformationResource($basic_information))->additional(['message' => 'Informacion basica guardada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show($id)
    {
        try {
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();
            $medical_history = MedicalHistory::where('patient_id', $patient->id)->with('allergypatient')->get();
            return (BasicInformationResource::collection($medical_history))->additional(['message' => 'Alergias encontradas']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }


    public function update(MedicalHistoryRequest $request, $id)
    {
        try {
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();
            $basic_information = MedicalHistory::where('patient_id', $patient->id)->firstOrFail();

            $basic_information->patient_id = $patient->id;
            $basic_information->weight = $request->weight;
            $basic_information->height = $request->height;

            $weight = $basic_information->weight;
            $height = $basic_information->height;

            $basic_information->imc = round((float)$weight->weight / pow((float)$height->height, 2));
            $basic_information->blood_type = $request->blood_type;
            $basic_information->save();

            $allergy_patient = AllergyPatient::where('id', $basic_information->allergy_patient_id)->firstOrFail();
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

    public function allergy(Request $request)
    {
        try {
            $allergy = Allergy::where('name', 'LIKE', "%" . $request->allergy . "%")->get();

            return (AllergyResource::collection($allergy))->additional(['message' => '..']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function blood_type()
    {
        try {
            $blood_type = BloodType::all();

            return (BloodTypeResource::collection($blood_type))->additional(['message' => '..']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
