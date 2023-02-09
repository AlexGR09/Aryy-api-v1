<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\StoreFacilityRequest as PhysicianStoreFacilityRequest;
use App\Http\Resources\API\V1\Patient\FacilityResource;
use App\Models\Facility;

class FacilityController extends Controller
{
    private $physicianId;
    public function __construct()
    {
        $this->middleware(['role:Physician|Administrator'])
        ->only(
            [
                'store',
                'delete',
            ]
        );
        $this->physicianId  =  auth()->user()?->physician?->id;
    }

    public function index()
    {
        return FacilityResource::collection(
            Facility::whereHas('physicians', function ($query) {
                $query->where('id', $this->physicianId);
            })->get()
        );
    }

    public function show(Facility $facility)
    {
        return new FacilityResource(
            $facility
        );
    }

    public function store(PhysicianStoreFacilityRequest $request)
    {
        $facility = Facility::create(
            $request->validated()
        );

        $facility->physicians()->attach(['physician_id' => $this->physicianId]);

        return new FacilityResource(
            $facility
        );
    }

    public function delete(Facility $facility)
    {
        $facility->delete();

        return new FacilityResource($facility);
    }
}
