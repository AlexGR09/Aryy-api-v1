<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFacilityRequest;
use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function __construct()
    {
        $this->middleware('facility_user')->only([
            'delete',
            'show'
        ]);
    }

    public function index()
    {
        
        return FacilityResource::collection(
            Facility::whereHas('users', function ($query) {
                $query->where('user_id', auth()->id());
            })->get()
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
        $facility = Facility::create(
            $request->validated()
        );
        $facility->users()->attach(['user_id' => auth()->id()]);

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
