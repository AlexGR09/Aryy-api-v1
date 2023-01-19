<?php

namespace App\Http\Controllers\API\V2\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V2\Patient\PillReminderRequest;
use App\Http\Resources\API\V2\Patient\PillReminderResource;
use App\Models\Patient;
use App\Models\PillReminder;

class PillReminderController extends Controller
{
    protected $patient;

    public function __construct()
    {
        $this->middleware('role:Patient');
    }

    public function index($patient_id)
    {
        try {
            $patient = $this->getPatient($patient_id);

            if (!$patient) {
                return $this->notFoundPatient();
            }

            return PillReminderResource::collection($patient->pillReminders)
                    ->additional(['message' => 'Recordatorio de medicamentos.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(PillReminderRequest $request, $patient_id)
    {
        try {
            $patient = $this->getPatient($patient_id);

            if (!$patient) {
                return $this->notFoundPatient();
            }

            $pill_reminder = $patient->pillReminders()
                ->create($request->validated());

            return (new PillReminderResource($pill_reminder))
                    ->additional(['message' => 'Recordatorio de medicamento guardado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy($patient_id, $pill_reminder_id)
    {
        try {
            $pill_reminder = PillReminder::where('id', $pill_reminder_id)
                ->where('patient_id', $patient_id)
                ->first();

            if (!$pill_reminder) {
                return $this->notFoundPatient();
            }

            $pill_reminder->delete();

            return response('', 204);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function getPatient($patient_id)
    {
        return Patient::where('user_id', auth()->id())
             ->where('id', $patient_id)
             ->first();
    }

    public function notFoundPatient()
    {
        return response()->json(['message' => 'No se encontraron resultados'], 404);
    }
}
