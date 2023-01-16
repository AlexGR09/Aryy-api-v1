<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\API\V1\Physician\GynecologicalHistoryResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\ObgynBackground;
use App\Models\Physician;
use Illuminate\Http\Request;

class GynecologicalHistoryController extends Controller
{

    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician')->only([
            'store',
            'show',
            'update'
        ]);
        // $this->user =  empty(auth()->id()) ? NULL : User::findOrFail(auth()->id());
        $this->physician = empty(auth()->id()) ? NULL : Physician::where('user_id', auth()->id())->firstOrFail();
    }

    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $medical_appointments = MedicalAppointment::where('patient_id', $request->patient_id)
                ->where('physician_id', $this->physician->id)
                ->count();

            if ($medical_appointments < 1) {
                return response()->json(['message' => 'Prohibido'], 403);
            }

            $gynecologicalHistory = ObgynBackground::create([
                'first_menstruation' => $request->first_menstruation,
                'last_menstruation' => $request->last_menstruation,
                'bleeding' => $request->bleeding,
                'pain' => $request->pain,
                'intimate_hygiene' => $request->intimate_hygiene,
                'cervical_discharge' => $request->cervical_discharge,
                'sex' => $request->sex,
                'pregnancies' => $request->pregnancies,
                'cervical_cancer' => $request->cervical_cancer,
                'breast_cancer' => $request->breast_cancer,
                'sexually_active' => $request->sexually_active,
                'family_planning' => $request->family_planning,
                'hormone_replacement_therapy' => $request->hormone_replacement_therapy,
                'last_pap_smear' => $request->last_pap_smear,
                'last_mammography' => $request->last_mammography,
            ]);
            $medical_history = MedicalHistory::where('id', $request->patient_id)->firstOrFail();
            $medical_history->gynecological_history_id = $gynecologicalHistory->id;
            $medical_history->save();
            DB::commit();
            return (new GynecologicalHistoryResource($gynecologicalHistory))->additional(['message' => 'Informacion guardada.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function show($id)
    {
        try {
            $medical_appointments = MedicalAppointment::where('patient_id', $id)
                ->where('physician_id', $this->physician->id)
                ->count();
            if ($medical_appointments < 1) {
                return response()->json(['message' => 'Prohibido'], 403);
            }
            $medicalhistory = MedicalHistory::where('patient_id', $id)->first();
            $gynecologicalHistory  = ObgynBackground::where('id', $medicalhistory->gynecological_history_id)
                ->first();
            return (new GynecologicalHistoryResource($gynecologicalHistory))->additional(['message' => 'Informacion encontrada.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $medical_history = MedicalHistory::where('patient_id', $id)->first();

            $medical_appointments = MedicalAppointment::where('patient_id', $medical_history->patient_id)
                ->where('physician_id', $this->physician->id)
                ->count();
            if ($medical_appointments < 1) {
                return response()->json(['message' => 'Prohibido'], 403);
            }
            $gynecologicalHistory = ObgynBackground::where('id', $medical_history->gynecological_history_id)->first();
            $gynecologicalHistory->first_menstruation = $request->first_menstruation;
            $gynecologicalHistory->last_menstruation = $request->last_menstruation;
            $gynecologicalHistory->bleeding = $request->bleeding;
            $gynecologicalHistory->pain = $request->pain;
            $gynecologicalHistory->intimate_hygiene = $request->intimate_hygiene;
            $gynecologicalHistory->cervical_discharge = $request->cervical_discharge;
            $gynecologicalHistory->sex = $request->sex;
            $gynecologicalHistory->pregnancies = $request->pregnancies;
            $gynecologicalHistory->cervical_cancer = $request->cervical_cancer;
            $gynecologicalHistory->breast_cancer = $request->breast_cancer;
            $gynecologicalHistory->sexually_active = $request->sexually_active;
            $gynecologicalHistory->family_planning = $request->family_planning;
            $gynecologicalHistory->hormone_replacement_therapy = $request->hormone_replacement_therapy;
            $gynecologicalHistory->last_pap_smear = $request->last_pap_smear;
            $gynecologicalHistory->last_mammography = $request->last_mammography;
            $gynecologicalHistory->save();

            DB::commit();
            return (new GynecologicalHistoryResource($gynecologicalHistory))->additional(['message' => 'Informacion actualizada.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function destroy($id)
    {
        //
    }
}
