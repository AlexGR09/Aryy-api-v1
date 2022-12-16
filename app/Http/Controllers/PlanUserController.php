<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePlanUserRequest;
use App\Models\User;

class PlanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ok('',User::with('userPlan')->whereHas('userPlan', function ($q) {
            return $q->where('user_id', auth()->id());
        })->first()?->user_plan);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlanUserRequest $request)
    {
        auth()
        ->user()
        ->userPlan()
        ->attach(
            $request->validated()
        );
        return User::with('userPlan')->find(auth()->id());
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
    public function update(StorePlanUserRequest $request)
    {
        auth()
        ->user()
        ->user_plan()
        ->sync(
            $request->validated()
        );
        return User::with('user_plan')->find(auth()->id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::find(auth()->id())->user_plan()->detach();
    }
}
