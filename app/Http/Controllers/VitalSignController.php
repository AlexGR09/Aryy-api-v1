<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreVitalSignRequest;
use App\Http\Requests\UpdateVitalSignRequest;
use App\Models\User;
use App\Models\VitalSign;

class VitalSignController extends Controller
{
    public function show(User $patient)
    {
        return ok('',  $patient->vitalSign);
    }
    
    public function patientInfo(User $patient)
    {
        return ok('',$patient->patient);
    }

    public function store(StoreVitalSignRequest $request)
    {
        return created('',  VitalSign::create($request->validated()));
    }

    public function update(VitalSign $vitalSign, UpdateVitalSignRequest $request)
    {
        return ok('',  tap($vitalSign)->update($request->validated()));
    }
}
