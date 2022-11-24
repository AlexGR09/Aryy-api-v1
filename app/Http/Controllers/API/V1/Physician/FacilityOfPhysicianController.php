<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Models\Facility;
use App\Models\Physician;
use Illuminate\Http\Request;

class FacilityOfPhysicianController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }

    public function store(Request $request) 
    {
        // $facility = new Facility();
        // $facility->facility_name = $request->facility_name;
        // $facility->location = json_encode($request->location);
        // $facility->phone_number = $request->phone_number;
        // $facility->zip_code = $request->zip_code;
        // $facility->schedule = json_encode($request->schedule);
        // $facility->consultation_length = $request->consultation_length;
        // $facility->accessibility = json_encode($request->accessibility);
        // $facility->clues = $request->clues;
        // $facility->city_id = $request->city_id;
        // $facility->save();


        // $physician  = Physician::findOrFail($physician_id);
        // $physician = Physician::where('user_id', $this->user->id)->first();
        $physician = Physician::where('id', 11)->first();

        $facility = 11;

        $physician->facilities()->attach($facility);
     

        return $physician;
    }
}
