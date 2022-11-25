<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Models\Facility;
use App\Models\Physician;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FacilityController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();
    }
    
    public function store(Request $request) 
    {
        try {
            if ($this->user->hasPermissionTo('create facilities')) {
                DB::beginTransaction();
                $facility = new Facility();
                $facility->facility_name = $request->facility_name;
                $facility->location = json_encode($request->location);
                $facility->phone_number = $request->phone_number;
                $facility->zip_code = $request->zip_code;
                $facility->schedule = json_encode($request->schedule);
                $facility->consultation_length = $request->consultation_length;
                $facility->accessibility = json_encode($request->accessibility);
                $facility->clues = $request->clues;
                $facility->city_id = $request->city_id;
                $facility->save();
                // RELACIÓN CON LA TABLA PIVOTE FACILITY_PHYSICIAN
                $physician = Physician::where('user_id', $this->user->id)->first();
                $physician->facilities()->attach($facility->id);
                DB::commit();
                return (new FacilityResource($facility))->additional(['message' => 'Instalación creada con éxito.']);
            }
            return response()->json(['message' => 'No puedes realizar esta acción.'], 403);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
