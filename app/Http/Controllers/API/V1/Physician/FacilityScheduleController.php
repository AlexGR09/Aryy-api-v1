<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\FacilityScheduleRequest;
use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Models\Facility;

class FacilityScheduleController extends Controller
{
    public function schedule(Facility $facility, FacilityScheduleRequest $request)
    {
        return new FacilityResource(tap($facility)->update($request->validated()));
    }
}
