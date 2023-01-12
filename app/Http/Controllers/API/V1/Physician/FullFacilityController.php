<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\FullFacilityRequest;
use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Models\Facility;

class FullFacilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('facility_user');
    }
    public function store(Facility $facility, FullFacilityRequest $request)
    {
        $facilityUpdatedOrCreated = Facility::updateOrCreate(
            ['id' => optional($facility)->id],
            $request->validated()
        );
        
        if (!optional($facility)->id) {
            $facilityUpdatedOrCreated->users()->attach(['user_id' => auth()->id()]);
        }

        return new FacilityResource($facilityUpdatedOrCreated);
    }
}
