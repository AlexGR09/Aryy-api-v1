<?php

namespace App\Http\Resources\API\V1\Search;

use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Http\Resources\API\V1\Physician\PhysicianSpecialtyResource;
use App\Models\Facility;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\DB;

class PhysicianSearchResource extends JsonResource
{
    
    public function toArray($request)
    {
        
        if (isset($this->city_id)) {
            // $facilities = Facility::where('city_id', $this->city)
            //     ->join('facility_physician', 'facilities.id', '=', 'facility_physician.facility_id')
            //     ->join('physicians', 'facility_physician.physician_id', '=', 'physicians.id')
            //     ->select('facilities.*')
            //     ->where('physicians.id', $this->id)
            //     ->get();
            $facilities = DB::select('CALL searchFacilitiesByPhysicianIdAndCityId(?, ?)', [$this->id, $this->city_id]);
        } else {
            // $facilities = DB::table('facilities')
            //     ->join('facility_physician', 'facilities.id', '=', 'facility_physician.facility_id')
            //     ->select('facilities.*')
            //     ->where('facility_physician.physician_id', $this->id)
            //     ->get();
            $facilities = DB::select('CALL searchFacilitiesByPhysicianId(?)', [$this->id]);

        }
        
        return [
            'physician_id' => $this->id,
            'professional_name' => $this->professional_name,
            'certificates' => json_decode($this->certificates),
            'social_networks' => json_decode($this->social_networks),
            'biography' => $this->biography,
            'is_verified' => $this->is_verified,
            // 'physician_specialties' => PhysicianSpecialtyResource::collection($this->physician_specialty),
            // 'facilities' => $this->__isset('facilities') ? FacilityResource::collection($facilities) : NULL,
            'facilities' => empty($facilities) ? NULL : FacilityResource::collection($facilities) 
        ];

    }
}
