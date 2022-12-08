<?php

namespace App\Http\Resources\API\V1\Search;

use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Http\Resources\API\V1\Physician\PhysicianSpecialtyResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PhysicianSearchResource extends JsonResource
{
    public function toArray($request)
    {
        if (property_exists($this, 'city_id') && $this->city_id !== null) {
            $facilities = DB::select('CALL getFacilitiesByPhysicianIdAndCityId(?, ?)', [$this->id, $this->city_id]);
        } else {
            $facilities = DB::select('CALL getFacilitiesByPhysicianId(?)', [$this->id]);
        }

        return [
            'physician_id' => $this->id,
            'professional_name' => $this->professional_name,
            'certificates' => json_decode((string) $this->certificates, null, 512, JSON_THROW_ON_ERROR),
            'social_networks' => json_decode((string) $this->social_networks, null, 512, JSON_THROW_ON_ERROR),
            'biography' => $this->biography,
            'is_verified' => $this->is_verified,
            'facilities' => $facilities === [] ? null : FacilityResource::collection($facilities),
            // 'physician_specialties' => PhysicianSpecialtyResource::collection($this->physician_specialty),
        ];
    }
}
