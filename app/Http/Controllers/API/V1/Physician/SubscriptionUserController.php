<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\Physician\StorePlanUserRequest;
use App\Models\User;

class SubscriptionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ok('', User::with('userSubscription')->whereHas('userSubscription', function ($q) {
            return $q->where('user_id', auth()->id());
        })->first()?->userSubscription);
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
        ->userSubscription()
        ->attach(
            $request->validated()
        );

        return User::with('userSubscription')->find(auth()->id());
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
        ->userSubscription()
        ->sync(
            $request->validated()
        );

        return User::with('userSubscription')->find(auth()->id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        return User::find(auth()->id())->userSubscription()->detach();
    }
}
