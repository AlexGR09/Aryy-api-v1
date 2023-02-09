<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\FullFacilityRequest;
use App\Http\Resources\API\V1\Patient\FacilityResource;
use App\Http\Resources\API\V1\Physician\FacilityResource as PhysicianFacilityResource;
use App\Models\Facility;

class FullFacilityController extends Controller
{
    public function __construct()
    {
        // $this->middleware('facility_user');
        $this->middleware(['role:Physician|Administrator','facility_physician']);
    }

    public function store(FullFacilityRequest $request)
    {
        $facility = Facility::create($request->validated());

        if (! optional($facility)->id) {
            $facility->physicians()->attach(['physician' => auth()->user()->physician->id]);
        }

        return new PhysicianFacilityResource($facility);
    }

    public function update(Facility $facility, FullFacilityRequest $request)
    {
        $facilityUpdatedOrCreated = Facility::updateOrCreate(
            ['id' => optional($facility)->id],
            $request->validated()
        );

        if (! optional($facility)->id) {
            $facilityUpdatedOrCreated->users()->attach(['user_id' => auth()->id()]);
        }

        return new PhysicianFacilityResource($facilityUpdatedOrCreated);
    }
}
