<?php

namespace App\Http\Resources\API\V1\Physician;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class ViewMedicationsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $updated_at = Carbon::createFromFormat('Y-m-d H:i:s', $this->updated_at)->format('Y-m-d');
        return [
            'id' => $this->id,
            'medication' => $this->drug_active,
            'previous_medication' => $this->previous_medication,
            'updated_at'=>$updated_at,
        ];
    }
}
