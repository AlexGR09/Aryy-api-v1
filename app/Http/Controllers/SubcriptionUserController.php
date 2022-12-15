<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubscriptionUserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class SubcriptionUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ok('',User::with('user_subscription')->whereHas('user_subscription', function ($q) {
            return $q->where('user_id', auth()->id());
        })->first()?->user_subscription);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubscriptionUserRequest $request)
    {
        auth()
        ->user()
        ->user_subscription()
        ->attach(
            $request->validated()
        );
        return User::with('user_subscription')->find(auth()->id());
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
    public function update(StoreSubscriptionUserRequest $request)
    {
        auth()
        ->user()
        ->user_subscription()
        ->sync(
            $request->validated()
        );
        return User::with('user_subscription')->find(auth()->id());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return User::find(auth()->id())->user_subscription()->detach();
    }
}
