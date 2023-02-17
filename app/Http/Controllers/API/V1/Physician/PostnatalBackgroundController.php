<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\PosnatalBackgroundRequest;
use App\Http\Resources\API\V1\Patient\PosnatalBackgroundResource;
use App\Models\MedicalAppointment;
use App\Models\MedicalHistory;
use App\Models\Physician;
use App\Models\PostnatalBackground;
use Illuminate\Http\Request;

class PostnatalBackgroundController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician');

        $this->physician = Physician::where('user_id', auth()->id())->first();
    }

    public function show(Request $request, $patient_id)
    {
        try {
            $medical_history = $this->medicalHistory($patient_id);

            if (! $medical_history || ! $medical_history->postnatal_background) {
                return response()->json(['message' => 'No existe historial médico o registro postnatal'], 404);
            }

            return (new PosnatalBackgroundResource($medical_history->postnatal_background))
                ->additional(['message' => 'Antecedente postnatal.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(PosnatalBackgroundRequest $request, $patient_id)
    {
        try {
            $medical_history = $this->medicalHistory($patient_id);

            if (! $medical_history || $medical_history->postnatal_background) {
                return response()->json(['message' => 'Historial médico no existe o registro postnatal ya existe'], 404);
            }

            $postnatal_background = PostnatalBackground::create($request->validated());

            $medical_history->postnatal_background()
                ->associate($postnatal_background);

            $medical_history->save();

            return (new PosnatalBackgroundResource($postnatal_background))
                ->additional(['message' => 'Antecedente postnatal guardado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(PosnatalBackgroundRequest $request, $patient_id)
    {
        try {
            $medical_history = $this->medicalHistory($patient_id);

            if (! $medical_history || ! $medical_history->postnatal_background) {
                return response()->json(['message' => 'Historial médico no existe o registro postnatal no existe'], 404);
            }

            $postnatal_background = $medical_history->postnatal_background;

            $postnatal_background->update($request->validated());

            return (new PosnatalBackgroundResource($postnatal_background))
                    ->additional(['message' => 'Antecedente postnatal actualizado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    // SE ASEGURA QUE EL MÉDICO PUEDA VER INFORMACIÓN SÓLO DEL PACIENTE QUE HA ATENDIDO
    public function medicalHistory($patient_id)
    {
        // try {
        //     $medical_history = MedicalHistory::where('id', $medical_history_id)->first();

        //     if ($medical_history) {
        //         $medical_appointments = MedicalAppointment::where('patient_id', $medical_history->patient_id)
        //             ->where('physician_id', $this->physician->id)
        //             ->count();

        //         if ($medical_appointments > 0) {
        //             return $medical_history;
        //         }
        //     }
        // } catch (\Throwable $th) {
        //     return response()->json(['error' => $th->getMessage()], 503);
        // }

        try {
            $medical_history = MedicalHistory::where('patient_id', $patient_id)->first();

            if ($medical_history) {
                $medical_appointments = MedicalAppointment::where('patient_id', $medical_history->patient_id)
                    ->where('physician_id', $this->physician->id)
                    ->count();

                if ($medical_appointments > 0) {
                    return $medical_history;
                }
            }
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
