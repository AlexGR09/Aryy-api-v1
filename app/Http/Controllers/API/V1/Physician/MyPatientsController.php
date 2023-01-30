<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Physician\PatientListResource;
use App\Models\MedicalAppointment;
use App\Models\Physician;
use Illuminate\Http\Request;

class MyPatientsController extends Controller
{
    protected $physician;

    public function __construct()
    {
        $this->middleware('role:Physician')->only([
            'index',
            'show',
        ]);
        $this->physician = empty(auth()->id()) ? null : Physician::where('user_id', auth()->id())->firstOrFail();
    }
    public function index()
    {
        $medicalAppointment = MedicalAppointment::where('physician_id',$this->physician->id)->with('patient')->get();

        return ( PatientListResource::collection($medicalAppointment));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //$medicalHistory =>
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
