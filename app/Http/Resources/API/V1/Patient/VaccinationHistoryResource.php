<?php

namespace App\Http\Resources\API\V1\Patient;

use Carbon\Carbon;
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
        $updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('Y-m-d');
        return [
            'id' => $this->id,
            'vaccine' => $this->vaccine,
            'dose' => $this->dose,
            'lot_number' => $this->lot_number,
            'application_date' => $this->application_date,
            'updated_at' => 'Editado el ' . $updated_at,
        ];
    }
}
