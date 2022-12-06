<?php

namespace App\Http\Controllers;

use App\Http\Requests\FullFacilityRequest;
use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Models\Facility;

class FullFacilityController extends Controller
{
    public function store(Facility $facility, FullFacilityRequest $request)
    {
        $facilityUpdatedOrCreated = Facility::updateOrCreate(
            ['id' => optional($facility)->id],
            $request->validated()
        );
        empty($facility) ? $facilityUpdatedOrCreated->users()->attach(['user_id' => auth()->id()]) : null;

        return new FacilityResource($facilityUpdatedOrCreated);
    }
}
