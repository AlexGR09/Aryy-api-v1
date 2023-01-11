<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
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
            'previusMedication',
        ]);
        // $this->user =  empty(auth()->id()) ? NULL : User::findOrFail(auth()->id());
        $this->physician = empty(auth()->id()) ? NULL : Physician::where('user_id', auth()->id())->firstOrFail();
    }

    public function index()
    {
        //
    }

    public function store(Request $request, $medical_history_id)
    {
        $medical_history = MedicalHistory::where('id', $medical_history_id)->firstOrFail();
        $medical_appointments = MedicalAppointment::where('patient_id', $medical_history->patient_id)
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
        //$medical_history->obgyn_background_id = $gynecologicalHistory->id;
        return $gynecologicalHistory;
    }

    public function show($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
        //
    }
}
