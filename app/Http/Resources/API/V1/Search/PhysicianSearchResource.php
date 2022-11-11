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
        // $facilities = $this->__isset('facilities') ? $this->facilities : null; 


        // ESTO SE RECIBIRÁ COMO PARÁMETRO
        $city = 12;
        $facilities = $this->facilities;
        if (isset($city)) {
            // GENERAR LA CONSULTA CON EL PARAMETRO
            $facilities = Facility::where('city_id', $city)
                ->join('facility_physician', 'facilities.id', '=', 'facility_physician.facility_id')
                ->join('physicians', 'facility_physician.physician_id', '=', 'physicians.id')
                ->where('physicians.id', $this->id)
            ->get();
            // throw new \ErrorException('existe facilities');
        }
        

        return [
            'physician_id' => $this->id,
            'professional_name' => $this->professional_name,
            'certificates' => json_decode($this->certificates),
            'social_networks' => json_decode($this->social_networks),
            'biography' => $this->biography,
            'is_verified' => $this->is_verified,
            'physician_specialties' => PhysicianSpecialtyResource::collection($this->physician_specialty),
            // 'facilities' => Facility::where()
            // 'facilities' => $facilities,
            'facilities' => $this->__isset('facilities') ? FacilityResource::collection($facilities) : NULL,
        ];
    }
}
