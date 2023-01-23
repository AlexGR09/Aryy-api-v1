<?php

namespace App\Http\Resources\API\V2\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class PillReminderResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'pill_reminder_id' => $this->id,
            'patient_id' => $this->patient_id,
            'drug' => $this->drug,
            'doce' => $this->doce,
            'frecuency' => $this->frecuency,
<<<<<<< HEAD
            'start_treatment' => $this->start_treatment,
            'end_treatment' => $this->end_treatment,
            'instruction' => $this->instruction,
            'status' => $this->status,
=======
            'start_treatment'=> $this->start_treatment,
            'end_treatment'=> $this->end_treatment,
            'first_take'=> $this->first_take,
            'instruction'=> $this->instruction,
            'status'=> $this->status,
>>>>>>> b79841ead77829b8713b5979009eb3dd67907391
        ];
    }
}
