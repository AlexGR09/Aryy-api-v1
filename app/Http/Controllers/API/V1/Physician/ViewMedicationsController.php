<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Physician\PreviousMedicationResource;
use App\Http\Resources\API\V1\Physician\ViewMedicationsResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\NonPathologicalBackground;
use App\Models\Physician;
use App\Models\Prescription;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class ViewMedicationsController extends Controller
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

    public function drugActive($id)
    {
        try {
            $cita = MedicalAppointment::where('patient_id', $id)
                ->where('physician_id', $this->physician->id)
                ->where('status', 'scheduled')
                ->orWhere('status', 'assisted')
                ->count();
            if ($cita < 1) {
                return response()->json(['Petición incorrecta']);
            }

            $medicalhistory = MedicalHistory::where('patient_id', $id)->first();
            
            $drug_active  = NonPathologicalBackground::where('id', $medicalhistory->non_pathological_background_id)
                ->first();
            
                return (new ViewMedicationsResource($drug_active))->additional(['message' => 'Informacion de Medicacion.']);
        } catch (\Throwable $th) {
            return response()->json(['Petición incorrecta' => $th->getMessage()], 400);
        }
    }

    public function previousMedication($id)
    {
        try {
            $cita = MedicalAppointment::where('patient_id', $id)
                ->where('physician_id', $this->physician->id)
                ->where('status', 'scheduled')
                ->orWhere('status', 'assisted')
                ->count();

            if ($cita < 1) {
                return response()->json(['Petición incorrecta']);
            }
            $medicalhistory = MedicalHistory::where('patient_id', $id)->first();
            $previus_medication  = NonPathologicalBackground::where('id', $medicalhistory->non_pathological_background_id)
                ->first();
            
                return (new PreviousMedicationResource($previus_medication))->additional(['message' => 'Informacion de Medicacion.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
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
        //
    }

    public function destroy($id)
    {
        //
    }
}
