<?php

namespace App\Http\Resources\API\V1\Patient;

use App\Models\PathologicalBackground;
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
        $patotlogias = PathologicalBackground::where('id', $this->id)->first();

        $array = json_decode($patotlogias, true);

        // Obtener los elementos no nulos
        $nonNullArray = array_filter($array, function ($value) {
            return !is_null($value);
        });

        // Obtener los elementos nulos y dividirlos en trozos de 2
        $nullArrayChunks = array_chunk(array_filter($array, function ($value) {
            return is_null($value);
        }), 2);

        /* print_r($nonNullArray);
        print_r($nullArrayChunks); */
        return [
            /* 'pathological_background_id' => $this->id,        
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
            'blood_diseases' => $this->blood_diseases, */
            'campos llenos'=> $nonNullArray,
            'campos nulos'=> $nullArrayChunks
        ];
    }
}
