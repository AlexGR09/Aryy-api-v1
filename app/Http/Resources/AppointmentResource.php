<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user_id' => $this->user_id,
            'physician_id' => $this->physician_id,
            'specialty_id' => $this->specialty_id,
            'appointment_date' => $this->appointment_date,
            'address' => $this->address,
            'status'=> $this->status,
        ];
    }
}
