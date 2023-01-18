<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\PrescriptionRequest;
use App\Http\Resources\API\V1\Physician\PrescriptionResource;
use App\Models\MedicalAppointment;
use App\Models\Physician;
use App\Models\Prescription;
use App\Models\VitalSign;
use Illuminate\Support\Facades\DB;

class PrescriptionController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician');

        $this->physician = Physician::where('user_id', auth()->id())->first();
    }

    public function store(PrescriptionRequest $request, $medical_appointment_id)
    {
        try {
            $data = $request->validated();

            DB::beginTransaction();
            if ($data['vital_signs']) {
                $vital_signs = VitalSign::create($data['vital_signs']);
            }

            $vital_signs_id = isset($vital_signs) ? ['vital_sign_id' => $vital_signs->id] : null;

            $medical_appointment = MedicalAppointment::where('id', $medical_appointment_id)
                ->where('physician_id', $this->physician->id)
                ->first();

            if (! $medical_appointment->prescription) {
                $prescription_validated = array_merge($data['prescription'], $vital_signs_id);

                $prescription = Prescription::create($prescription_validated);

                $medical_appointment->update(['prescription_id' => $prescription->id]);

                DB::commit();

                return (new PrescriptionResource($prescription))
                    ->additional(['message' => 'Receta médica creada con éxito.']);
            }

            return response()->json(['message' => 'Parece que la receta médica ya se creó anteriormente '], 503);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
