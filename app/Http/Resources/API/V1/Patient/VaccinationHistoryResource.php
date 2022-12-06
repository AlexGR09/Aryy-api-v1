<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class VaccinationHistoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function toArray($request): array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
    {
        return [
            'vaccine' => $this->vaccine,
            'dose' => $this->dose,
            'lot_number' => $this->lot_number,
            'application_date' => $this->application_date,
        ];
    }
}
