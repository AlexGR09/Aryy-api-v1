<?php

namespace App\Http\Controllers\API\V1\Patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Patient\PatientRequest;
use App\Http\Requests\API\V1\Patient\UserRequest;
use App\Http\Resources\API\V1\Catalogues\CityResource;
use App\Http\Resources\API\V1\Catalogues\CountryResource;
use App\Http\Resources\API\V1\Catalogues\StateResource;
use App\Http\Resources\API\V1\Patient\PatientResource;
use App\Models\City;
use App\Models\Country;
use App\Models\MedicalHistory;
use App\Models\Patient;
use App\Models\OccupationPatient;
use App\Models\State;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = auth()->user();

        $this->middleware('role:Patient')->only([
            'index',
            'show',
            'update'
        ]);
        $this->middleware('permission:create patient profiles')->only(['store']);
    }

    public function index()
    {
        try {
            $user = User::find(auth()->id());
            $patients = $user->patients;

            return (PatientResource::collection($patients))->additional(['message' => 'Perfiles de pacientes en esta cuenta.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function store(Request $request)
    {
        try {
            $user = User::find(auth()->id());

            if (count($user->patients) > 4) {
                return response()->json(['messaage' => 'No puedes agregar más pacientes'], 503);
            }

            DB::beginTransaction();

            $patient = Patient::create([
                'user_id' => $user->id,
                'city_id' => $request->city_id,
                'full_name' => $request->full_name,
                'gender' => $request->gender,
                'birthday' => $request->birthday,
                'address' => $request->address,
                'zip_code' => $request->zip_code,
                'country_code' => $request->country_code,
                'emergency_number' => $request->emergency_number,
                'id_card' => $request->id_card
            ]);

            $patient->occupations()->attach($request->occupation_id);

            // CREA EL DIRECTORIO CORRESPONDIENTE DEL PACIENTE EN LA CARPETA DEL USUARIO
            $patient_folder  = '//' . $patient->id . '_' . substr(sha1(time()), 0, 8);
            Storage::makeDirectory($user->user_folder . $patient_folder);

            $patient->patient_folder = $patient_folder;
            $patient->save();

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

    public function update(Request $request)
    {
        //En correccion
         try {

        DB::beginTransaction();
        $test = Patient::where('id', $request->patient_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $test->city_id = $request->city_id;
        $test->full_name = $request->full_name;
        $test->gender = $request->gender;
        $test->birthday = $request->birthday;
        $test->country_code = $request->country_code;
        $test->emergency_number = $request->emergency_number;
        $test->occupations()->sync($request->occupation_id);
        $test->save();


        DB::commit();
        return (new PatientResource($test))->additional(['message' => 'paciente actualizado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
    
    public function country(Request $request)
    {
        try {
            return Country::where('name', 'LIKE', "%" . $request->name . "%")->first();
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function country_states(Request $request)
    {
        try {
            $country = Country::where('name', $request->country)->first();
            return (StateResource::collection(State::orderBy('name')
                ->where('country_id', $country->id)->where('name', 'LIKE', "%" . $request->name . "%")->get()))
                ->additional(['message' => 'Estados encontrados.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function cities_states(Request $request)
    {
        try {
            $country_states = State::where('name', $request->country_states)->first();

            return (CityResource::collection(City::orderBy('name')
                ->where('state_id', $country_states->id)->where('name', 'LIKE', "%" . $request->name . "%")->get()))
                ->additional(['message' => 'Ciudades encontradas.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
