<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\UpdateAppointmentRequest;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Resources\AppointmentResource;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public $currentUser;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $status = $request->status;
        if (User::find(auth()->id())->hasRole('Physician')) {
            $this->currentUser = [[
                'user_id_physician' => auth()->id(),
            ]];
        }

        if (User::find(auth()->id())->hasRole('Patient')) {
            $this->currentUser = [[
                'user_id_patient' => auth()->id(),
            ]];
        }

        return  AppointmentResource::collection(
            Appointment::where($this->currentUser)
            ->when($status, function ($q) use ($status) {
                return $q->whereIn('status', $status);
            })
            ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAppointmentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAppointmentRequest $request)
    {
        return new AppointmentResource(
            Appointment::create($request->validated())
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function show(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAppointmentRequest  $request
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        return new AppointmentResource(
            tap($appointment)->update($request->validated())
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Appointment  $appointment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Appointment $appointment)
    {
        return new AppointmentResource(
            tap($appointment)->update(['status' => 'canceled'])
        );
    }
}
