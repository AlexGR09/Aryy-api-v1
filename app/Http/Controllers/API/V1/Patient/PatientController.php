<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\PatientRequest;
use App\Http\Resources\API\V1\Catalogues\CityResource;
use App\Http\Resources\API\V1\Catalogues\StateResource;
use App\Http\Resources\API\V1\Patient\PatientResource;
use App\Http\Resources\API\V1\Patient\ShowOccupationResource;
use App\Models\City;
use App\Models\Country;
use App\Models\MedicalHistory;
use App\Models\Occupation;
use App\Models\Patient;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();

        $this->middleware('role:Patient')->only([
            'index',
            'show',
            'update',
        ]);
        $this->middleware('role:NewPatient')->only(['store']);
    }

    public function index()
    {
        try {
            $user = User::find(auth()->id());
            $patients = $user->patients;

            return PatientResource::collection($patients)->additional(['message' => 'Perfiles de pacientes en esta cuenta.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(PatientRequest $request)
    {
        try {
            $user = User::find(auth()->id());

            DB::beginTransaction();

            $patient = $user->patients()->create($request->validated());

            $patient->occupations()->attach($request->occupation_id);

            $user->syncRoles(['User', 'Patient']);

            MedicalHistory::create(['patient_id' => $patient->id]);

            DB::commit();

            return (new PatientResource($patient))->additional(['message' => 'Perfil de paciente creado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show($id)
    {
        try {
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            return (new PatientResource($patient))->additional(['message' => 'Perfil del paciente.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update(Request $request, $id)
    {
        //En correccion
        try {
            DB::beginTransaction();
            $patient = Patient::where('id', $id)
                ->where('user_id', auth()->id())
                ->firstOrFail();

            $patient->city_id = $request->city_id;
            $patient->full_name = $request->full_name;
            $patient->gender = $request->gender;
            $patient->birthday = $request->birthday;
            $patient->country_code = $request->country_code;
            $patient->emergency_number = $request->emergency_number;
            $patient->occupations()->sync($request->occupation_id);
            $patient->save();

            DB::commit();

            return (new PatientResource($patient))->additional(['message' => 'paciente actualizado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function country(Request $request)
    {
        try {
            return Country::where('name', 'LIKE', '%'.$request->name.'%')->first();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function country_states(Request $request)
    {
        try {
            $country = Country::where('name', $request->country)->first();

            return StateResource::collection(State::orderBy('name')
                ->where('country_id', $country->id)->where('name', 'LIKE', '%'.$request->name.'%')->get())
                ->additional(['message' => 'Estados encontrados.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function cities_states(Request $request)
    {
        try {
            $country_states = State::where('name', $request->country_states)->first();

            return CityResource::collection(City::orderBy('name')
                ->where('state_id', $country_states->id)->where('name', 'LIKE', '%'.$request->name.'%')->get())
                ->additional(['message' => 'Ciudades encontradas.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function occupation()
    {
        $occupations = Occupation::all();

        return  ShowOccupationResource::collection($occupations)->additional(['message' => 'Ocupaciones encontradas.']);
    }
}
