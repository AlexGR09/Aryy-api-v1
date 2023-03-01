<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class PerinatalBackgroundResource extends JsonResource
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
            'perinatal_background_id' => $this->id,
            'last_menstrual_cycle' => $this->last_menstrual_cycle,
            'cycle_time' => $this->cycle_time,
            'contraceptive_method_use' => $this->contraceptive_method_use,
            'assisted_conception' => $this->assisted_conception,
            'final_ppf' => $this->final_ppf,
        ];
    }
}