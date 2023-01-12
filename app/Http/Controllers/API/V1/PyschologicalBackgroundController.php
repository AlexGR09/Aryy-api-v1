<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePyschologicalBackgroundRequest;
use App\Http\Requests\UpdatePyschologicalBackgroundRequest;
use App\Models\MedicalHistory;
use App\Models\User;
use Illuminate\Http\Request;

class PyschologicalBackgroundController extends Controller
{
    public function show(User $patient)
    {
        $medicalHistory = MedicalHistory::where('user_id',$patient->id)->first();
        return ok('', $medicalHistory->pyschologicalbackground);
    }

    public function store(StorePyschologicalBackgroundRequest $request)
    {
        $medicalHistory = MedicalHistory::where('user_id',$request->user_id)->first();
        return ok('', $medicalHistory->pyschologicalbackground()->create($request->validated()));
    }

    public function update(UpdatePyschologicalBackgroundRequest $request)
    {
        $medicalHistory = MedicalHistory::where('user_id',$request->user_id)->first();
        return ok('', $medicalHistory->pyschologicalbackground()->update($request->validated()));
    }

}
