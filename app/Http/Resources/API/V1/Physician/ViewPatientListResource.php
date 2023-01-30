<?php

namespace App\Http\Resources\API\V1\Physician;

use App\Http\Resources\API\V1\Auth\UserResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ViewPatientListResource extends JsonResource
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
            'id'=>$this->id,
            'full_name'=>$this->full_name,
            'user_info'=>new UserResource($this->user),
        ];
    }
}
