<?php

namespace App\Http\Resources\API\V1\Patient;

use Illuminate\Http\Resources\Json\JsonResource;

class InfoPhysicianResource extends JsonResource
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
            'physician_id' => $this->id,
            'user_id' => $this->user_id,
            'professional_name' => $this->professional_name,
            'certificates' => $this->certificates,
            'social_networks' => $this->social_networks,
            'biography' => $this->biography,
            'first_time_consultation' => $this->first_time_consultation,
            'subsequent_consultation' => $this->subsequent_consultation,
            'languages' => $this->languages,
            'is_verified' => $this->is_verified,
            'score' => $this->score,
            'facilitiesCoordinates' => $this->facilitiesCoordinates,
            'facilities' => $this->facilities,
            'comment_count' => $this->comment_count,
            'specialty' => $this->specialty,
            'physician_specialty' => $this->physician_specialty,
        ];
    }
}
