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

        $this->patient = Patient::where('user_id', auth()->id())->first();
    }

    public function index()
    {
        try {
            return PillReminderResource::collection($this->patient->pillReminders)
                    ->additional(['message' => 'Recordatorio de medicamentos.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(PillReminderRequest $request)
    {
        try {
            $pill_reminder = $this->patient->pillReminders()
                ->create($request->validated());

            return (new PillReminderResource($pill_reminder))
                    ->additional(['message' => 'Recordatorio de medicamento guardado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function destroy($pill_reminder_id)
    {
        try {
            $pill_reminder = PillReminder::where('id', $pill_reminder_id)
                ->where('patient_id', $this->patient->id)
                ->first();

            if (!$pill_reminder) {
                return response()->json(['message' =>'Recordatorio de medicamento no encontrado'], 404);
            }

            $pill_reminder->delete();

            return (new PillReminderResource($pill_reminder))
                    ->additional(['message' => 'Recordatorio de medicamento eliminado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
