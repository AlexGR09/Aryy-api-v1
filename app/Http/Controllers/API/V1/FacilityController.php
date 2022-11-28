<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Requests\UpdateFacilityRequest;
use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        return FacilityResource::collection(
            Facility::where('user_id', auth()->id())->get()
        );
    }
    public function show(Facility $facility)
    {
        return new FacilityResource(
            $facility
        );
    }
    public function store(StoreFacilityRequest $request)
    {
        return new FacilityResource(
            Facility::create(
                $request->validated() + ['user_id' => auth()->id()]
            )
        );
    }
    public function update(Facility $facility, UpdateFacilityRequest $request)
    {
        return new FacilityResource($facility->update($request->validated()));
    }
    public function delete(Facility $facility)
    {
        $facility->delete();
        return new FacilityResource($facility);
    }
    public function schedule(Facility $facility, )
    {
        # code...
    }
}
