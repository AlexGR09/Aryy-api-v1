<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\FacilityScheduleRequest as PhysicianFacilityScheduleRequest;
use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Models\Facility;

class FacilityScheduleController extends Controller
{
    public function schedule(Facility $facility, PhysicianFacilityScheduleRequest $request)
    {
        return new FacilityResource(tap($facility)->update($request->validated()));
    }
}
