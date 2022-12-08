<?php

namespace App\Http\Resources\API\V1\Catalogues;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\API\V1\Catalogues\StateResource;
class CityResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'city_id' => $this->id,
            'name' => $this->name,
            'state_id' => $this->state_id,
            'state'=> new StateResource($this->state)
        ];
    }
}
