<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\ScheduleFacilityRequest;
use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Models\Facility;

class ScheduleFacilityController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Facility $facility, ScheduleFacilityRequest $request)
    {
        $facility = Facility::whereHas('users', function ($query) use ($facility) {
            $query->where('user_id', auth()->id());
            $query->where('facility_id', $facility->id);
        })->first();
        $facility = tap($facility)->update($request->validated());

        return new FacilityResource($facility);
    }
}
