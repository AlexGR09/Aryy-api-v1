<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Physician\ViewMedicationsResource;
use Illuminate\Support\Facades\DB;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\NonPathologicalBackground;
use App\Models\Physician;
use Illuminate\Http\Request;

class StatusTreatmentController extends Controller
{
    protected $physician;
    public function __construct()
    {
        $this->middleware('role:Physician')->only([
            'drugActive',
            'previusMedication',
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
        //
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        try {
        DB::beginTransaction();
        $cita = MedicalAppointment::where('patient_id', $id)
            ->where('physician_id', $this->physician->id)
            ->count();
        if ($cita < 1) {
            return response()->json(['Petición incorrecta']);
        }
        $medicalHistory = MedicalHistory::where('patient_id', $id)
            ->first();
        $drug_active  = NonPathologicalBackground::where('id', $medicalHistory->non_pathological_background_id)
            ->first();
        if ($drug_active->previous_medication == NULL) {
            $drug_active->previous_medication = $request->drug_active;
            $drug_active->drug_active = NULL;
            $drug_active->save();
            return response()->json(["Trataniento Completado", $request->drug_active]);
        }
        $new_medicine = $drug_active->previous_medication . ',' . $request->drug_active;
        $drug_active->previous_medication = $new_medicine;
        $drug_active->drug_active = NULL;
        $drug_active->save();

        DB::commit();
        //return (new ViewMedicationsResource($drug_active));
        return response()->json(["Trataniento Completado", $request->drug_active]);
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
