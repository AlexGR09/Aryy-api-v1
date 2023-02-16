<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\StorePlanPhysicianRequest;
use App\Http\Requests\API\V1\Physician\StorePlanUserRequest;
use App\Http\Requests\API\V1\Physician\UpdatePlanPhysicianRequest;
use App\Models\Physician;
use App\Models\User;

class SubscriptionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Physician $physician)
    {
        return ok('', Physician::withWhereHas('subscription', function ($q) use($physician) {
            return $q->where('physician_id', $physician->id);
        })->first()->subscription);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanPhysicianRequest $request)
    {
        $data = $request->validated();
        $physician = Physician::find($data["physician_id"]);
        $physician->subscription()->attach($data["plan_id"]);
        return ok('', $physician->subscription);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Physician $physician, UpdatePlanPhysicianRequest $request)
    {
        $data = $request->validated();
        $physician->subscription()->sync($data["plan_id"]);
        return ok('', $physician->subscription);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Physician $physician)
    {
        $physician->subscription()->detach();
        return ok('',);
    }
}
