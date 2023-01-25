<?php

namespace App\Http\Resources\API\V1\Physician;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MedicalAppointmentResource extends JsonResource
{
    public function toArray($request)
    {

        // TENATIVO A CAMBIO CON EL PASTILLERO
        $duration_of_treatment =  NULL;

        if ($this->prescription) {

            $duration_treatment = $this->prescription->treatment['duration_days'];

            $start_treatment = Carbon::parse($this->prescription->created_at);
            $start_treatment_parse =  $start_treatment->translatedFormat('d/M/Y');

            $end_treatment = $start_treatment->addDays($duration_treatment);
            $end_treatment_parse =  $end_treatment->translatedFormat('d/M/Y');

            $duration_of_treatment =  $start_treatment_parse . ' - ' . $end_treatment_parse;
        }

        
        return [
            'medical_appointment_id' => $this->id,
            'patient_id' => $this->patient_id,
            'patient_name' => $this->patient->full_name,
            'status' => $this->status,
            'appointment_date' => $this->appointment_date,
            'note' => $this->note,
            'prescription' => $this->prescription,
            'duration_treatment' => $duration_of_treatment,
        ];
    }
}
