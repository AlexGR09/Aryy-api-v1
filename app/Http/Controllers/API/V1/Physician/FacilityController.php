<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\FacilityRequest;
use App\Http\Resources\API\V1\Physician\FacilityMinifiedResource;
use App\Http\Resources\API\V1\Physician\FacilityResource;
use App\Models\Facility;
use App\Models\Physician;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class FacilityController extends Controller
{
    protected $user, $physician;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->physician = Physician::where('user_id', $this->user->id)->firstOrFail();
        $this->middleware('permission:show physician facility')->only([
            'index',
            'show',

        ]);
        $this->middleware('permission:create physician facility')->only([
            'store',
        ]);
        $this->middleware('permission:edit physician facility')->only([
            'update',
        ]);
        $this->middleware('permission:delete physician facility')->only([
            'destroy',
        ]);
    }

    public function index()
    {
        try {
            return (FacilityMinifiedResource::collection($this->physician->facilities));
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show($id)
    {
        try {
            $facility = $this->facilityOfPhysician($id);
            return (new FacilityResource($facility))->additional(['message' => 'Instalación encontrada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(FacilityRequest $request)
    {
        try {
            DB::beginTransaction();
            $facility = new Facility();
            $facility->facility_name = $request->facility_name;
            $facility->location = json_encode($request->location);
            $facility->phone_number = $request->phone_number;
            $facility->zip_code = $request->zip_code;
            $facility->schedule = json_encode($request->schedule);
            $facility->type_schedule = $request->type_schedule;
            $facility->consultation_length = $request->consultation_length;
            $facility->accessibility_and_others = json_encode($request->accessibility_and_others);
            $facility->clues = $request->clues;
            $facility->city_id = $request->city_id;
            $facility->save();
            // RELACIÓN CON LA TABLA PIVOTE FACILITY_PHYSICIAN
            $this->physician->facilities()->attach($facility->id);
            DB::commit();
            return (new FacilityResource($facility))->additional(['message' => 'Instalación creada con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(FacilityRequest $request, $id)
    {
        try {

            $facility = $this->facilityOfPhysician($id);

            $facility->facility_name = $request->facility_name;
            $facility->location = json_encode($request->location);
            $facility->phone_number = $request->phone_number;
            $facility->zip_code = $request->zip_code;
            $facility->schedule = json_encode($request->schedule);
            $facility->type_schedule = $request->type_schedule;
            $facility->consultation_length = $request->consultation_length;
            $facility->accessibility_and_others = json_encode($request->accessibility_and_others);
            $facility->clues = $request->clues;
            $facility->city_id = $request->city_id;
            $facility->save();

            return (new FacilityResource($facility))->additional(['message' => 'Instalación actualizada con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public  function destroy($id)
    {
        try {

                $facility = $this->facilityOfPhysician($id);
                $facility->delete();
                return (new FacilityResource($facility))->additional(['message' => 'Instalación eliminada con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function facilityOfPhysician($id)
    {
        try {
            $facilityQuery = Facility::query();
            $facilityQuery->whereHas('physicians', function (Builder $query) {
                $query->where('physicians.id', '=', $this->physician->id);
            });

            $facilityQuery->where('id', $id);

            return $facilityQuery->firstOrFail();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
