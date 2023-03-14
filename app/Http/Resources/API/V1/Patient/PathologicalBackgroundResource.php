<?php

namespace App\Http\Resources\API\V1\Patient;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PathologicalBackgroundResource extends JsonResource
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
            'pathological_background_id' => $this->id,        
            'previous_surgeries' => $this->previous_surgeries,
            'blood_transfusions' => $this->blood_transfusions,
            'diabetes' => $this->diabetes,
            'heart_diseases' => $this->heart_diseases,
            'blood_pressure' => $this->blood_pressure,
            'thyroid_diseases' => $this->thyroid_diseases,
            'cancer' => $this->cancer,
            'kidney_stones' => $this->kidney_stones,
            'hepatitis' => $this->hepatitis,
            'trauma' => $this->trauma,
            'respiratory_diseases' => $this->respiratory_diseases,
            'ets' => $this->ets,
            'gastrointestinal_pathologies' => $this->gastrointestinal_pathologies,
            'blood_diseases' => $this->blood_diseases,
            'updated_at' => 'Editado el ' . $updated_at,
        ];
    }
}
