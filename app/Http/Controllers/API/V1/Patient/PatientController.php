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

    public function update(PatientRequest $request)
    {
        try {
            DB::beginTransaction();

            $patient = Patient::where('user_id', $this->user->id)->first();
            $patient->emergency_number = $request->emergency_number;
            $patient->city_id = $request->city_id;
            $patient->country_code = $request->country_code;
            $patient->save();

            $user = User::where('id', $this->user->id)->first();
            $user->full_name = $request->full_name;
            $user->gender = $request->gender;
            $user->birthday = $request->birthday;
            $user->country_code = $request->country_code;
            $user->phone_number = $request->phone_number;
            $user->save();

            $patient_occupation = OccupationPatient::where('patient_id', $patient->id)->first();
            $patient_occupation->occupation_id = $request->occupation_id;
            $patient_occupation->patient_id = $patient->id;
            $patient_occupation->save();

            DB::commit();
            return (new PatientResource($patient))->additional(['message' => 'paciente actualizado con éxito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
    public function destroy_occupation()
    {
        try {
            $patient = Patient::where('user_id', $this->user->id)->first();
            $patient_occupation = OccupationPatient::where('patient_id', $patient->id)->first();

            $patient_occupation->occupation_id = 1;
            $patient_occupation->save();
            return $patient_occupation;
            //return (new LocationResource($patient))->additional(['message' => 'Informacion basica guardada con exito.']);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json(['error' => $th->getMessage()], 500);
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
            $country = Country::where('name',$request->country)->first();
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
            $country_states = State::where('name',$request->country_states)->first();
            
            return (CityResource::collection(City::orderBy('name')
                ->where('state_id', $country_states->id)->where('name', 'LIKE', "%" . $request->name . "%")->get()))
                ->additional(['message' => 'Ciudades encontradas.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
