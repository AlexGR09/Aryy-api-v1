<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Physician\CalendarAppointmentCollection;
use App\Http\Resources\API\V1\Physician\CalendarAppointmentResource;
use App\Http\Resources\API\V1\Physician\CalendarResource;
use App\Http\Resources\API\V1\Physician\FacilityPhysicanResource;
use App\Http\Resources\API\V1\Physician\PatientMedicalAppointmentResource;
use App\Models\Appointment;
use App\Models\Facility;
use App\Models\FacilityPhysician;
use App\Models\MedicalAppointment;
use App\Models\Patient;
use App\Models\Physician;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarAppointmentController extends Controller
{
    protected $physician;

    protected $patient;

    public function __construct()
    {
        $this->middleware('role:Physician')->only([
            'index',
            'show',
            'store',
        ]);
        // $this->user =  empty(auth()->id()) ? NULL : User::findOrFail(auth()->id());
        $this->physician = empty(auth()->id()) ? null : Physician::where('user_id', auth()->id())->firstOrFail();
    }

    public function index(Request $request)
    {
        // TIPO = HOY, SEMANA, MES
        // MES = ?
        // AÑO = ?
        $type = $request->type;
        $month = $request->month;
        $day = $request->day;
        $year = $request->year;
        $todaydatetime = today();  //fecah y hora
        $dateToday = $todaydatetime->toDateString(); // fecha de hoy
        $monthnow = $todaydatetime->format('m'); //SE EXTRAE EL MES

        switch ($type) {
            case 'all':
                $todayAppointments = MedicalAppointment::where('physician_id', $this->physician->id)->get();

                return new CalendarAppointmentCollection($todayAppointments); //RETORNA LA COLECCION
                break;
            case 'today':

                $todayAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->where('appointment_date', $dateToday)
                    ->get();

                return new CalendarAppointmentCollection($todayAppointments); //RETORNA LA COLECCION
                break;

            case 'week':
                $weekstart = $todaydatetime->startOfWeek()->toDateString(); // Inicio de la semana
                $weekend = $todaydatetime->endOfWeek()->toDateString(); // Fin de la semana
                $weekAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->whereBetween('appointment_date', [$weekstart, $weekend])
                    ->get();

                return new CalendarAppointmentCollection($weekAppointments); //RETORNA LA COLECCION
                break;
            case 'month':
                $month_start = date('Y-m-01'); // SE DETERMINA EL INICO DEL MES
                $month_end = date('Y-m-t'); //SE DETERMINA EL FIN DEL MES

                $monthAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->whereBetween('appointment_date', [$month_start, $month_end])
                    ->get();

                return new CalendarAppointmentCollection($monthAppointments); //RETORNA LA COLECCION
                break;

            default:
                return response()->json(['Message' => 'Peticion Incorrecta', 400]);
                break;
        }
    }

    public function store(Request $request)
    {
        try {
            $user = User::where('phone_number', $request->phone_number)->first();
            DB::beginTransaction();
            //SE VERIFICA SI EL PERFIL DEL USUARIO EXISTE
            if (! $user) {
                $user = User::create([
                    'country_code' => $request->country_code,
                    'phone_number' => $request->phone_number,
                ]);
            }
            $patient = Patient::where('user_id', $user->id)->first();
            if (! $patient) {
                $patient = Patient::create([
                    'user_id' => $user->id,
                    'full_name' => $request->full_name,
                    'country_code' => $request->country_code,
                    'emergency_number' => $request->emergency_number,
                ]);
            }
            $facility = Facility::find($request->facility_id);
            if (!$facility->checkValidDate($request->appointment_date, $request->appointment_time)) {
                return response()->json(['message' => 'No se puede agendar una cita en un horario no disponible'], 503);
            }
            $time = strtotime($request->appointment_time) + strtotime($facility->consultation_length); //SUMA LA DURACION DE LA CONSULTA A LA HORA DE LA CITA
            $date_time_end = date('H:i:s', $time); //SE LE DA EL FORMATO DE HORA */
            $medicalAppointment = MedicalAppointment::greaterThanDate($request->appointment_date, $request->appointment_time)
                ->first();
            if (!empty($medicalAppointment)) {
                return response()->json(['message' => 'Fecha y horario no disponibles'], 503);
            }
            /* $medicalAppointment = MedicalAppointment::where('appointment_date', $request->appointment_date)
                ->where('appointment_time', $request->appointment_time)->first();

            if ($medicalAppointment) {
                return response()->json(['message' => 'Fecha y horario no disponibles'], 503);
            } */
            $medicalAppointment = MedicalAppointment::create([
                'appointment_date' => $request->appointment_date,
                'appointment_type' => $request->appointment_type,
                'appointment_time' => $request->appointment_time,
                'appointment_time_end' => $date_time_end,
                'patient_id' => $patient->id,
                'physician_id' => $this->physician->id,
                'facility_id' => $request->facility_id,
                'status' => 'scheduled',
            ]);
            DB::commit();

            return (new CalendarResource($medicalAppointment))->additional(['message' => 'Cita agendada correctamente.']);
        } catch (\Throwable $th) {
            DB::rollback();

            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function show($id)
    {
        try {
            $appointment = $this->physician->medical_appointments()
                ->where('id', $id)
                ->first();

            return (new CalendarAppointmentResource($appointment))->additional(['message' => 'Cita encontrada.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    public function update($id)
    {
        try {
            $medicalAppointment = $this->physician->medical_appointments()
                ->where('id', $id)
                ->first();
            $medicalAppointment->status = 'cancelled';
            $medicalAppointment->save();

            return response()->json(['status' => 'Cita cancelada con exito']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }

    //CONSULTA PARA LOS SELECT´S
    public function facilityphysician()
    {
        $facility = FacilityPhysician::where('physician_id', $this->physician->id)->get();

        return FacilityPhysicanResource::collection($facility)->additional(['message' => 'Consultorio encontrado']);
    }

    public function patient($phone_number, Request $request)
    {
        $user = User::where('phone_number', $phone_number)->first();
        $patient = Patient::where('user_id', $user->id)->where('full_name', 'LIKE', '%'.$request->full_name.'%')->get();

        return PatientMedicalAppointmentResource::collection($patient)->additional(['message' => 'Paciente encontrado']);
    }
}
