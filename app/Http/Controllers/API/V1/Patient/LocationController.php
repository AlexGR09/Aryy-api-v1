<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\LocationRequest;
use App\Http\Resources\API\V1\Patient\LocationResource;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LocationController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();

        
        $this->middleware('role:Patient')->only(['store', 'show', 'update']);
       
    }

    public function index()
    {
        //
    }

    public function store(LocationRequest $request)
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();

            DB::beginTransaction();
            $patient->address = $request->address;
            $patient->zip_code = $request->zip_code;
            $patient->save();

            DB::commit();
            return (new LocationResource($patient))->additional(['message' => 'Informacion basica guardada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show()
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();
            return (new LocationResource($patient))->additional(['message' => 'Informacion basica guardada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(LocationRequest $request)
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();

            DB::beginTransaction();
            $patient->address = $request->address;
            $patient->zip_code = $request->zip_code;
            $patient->save();

            DB::commit();
            return (new LocationResource($patient))->additional(['message' => 'Informacion basica guardada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        //
    }
}
