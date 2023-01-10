<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\MedicalAppointment;
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
            $drug_active  = NonPathologicalBackground::where('id', $id)
                ->first();
            $new_medicine = $drug_active->drug_active . ',' . $request->drug_active['medicine'];
            $drug_active->previous_medication = $new_medicine;
            $drug_active->drug_active = '';
            $drug_active->save();

            DB::commit();
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
