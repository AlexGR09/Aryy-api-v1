<?php

namespace App\Http\Resources\API\V1\Search;

use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Http\Resources\API\V1\Physician\PhysicianSpecialtyResource;
use App\Models\Facility;
use Illuminate\Http\Resources\Json\JsonResource;

class PhysicianSearchResource extends JsonResource
{
    
    public function toArray($request)
    {
        $facilities = $this->facilities;

        if (isset($this->city)) {
            $facilities = Facility::where('city_id', $this->city)
                ->join('facility_physician', 'facilities.id', '=', 'facility_physician.facility_id')
                ->join('physicians', 'facility_physician.physician_id', '=', 'physicians.id')
                ->select('facilities.*')
                ->where('physicians.id', $this->id)
                ->get();
        }
        
        return [
            'physician_id' => $this->id,
            'professional_name' => $this->professional_name,
            'certificates' => json_decode($this->certificates),
            'social_networks' => json_decode($this->social_networks),
            'biography' => $this->biography,
            'is_verified' => $this->is_verified,
            'physician_specialties' => PhysicianSpecialtyResource::collection($this->physician_specialty),
            'facilities' => $this->__isset('facilities') ? FacilityResource::collection($facilities) : NULL,
        ];
    }
}
