<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\AppointmentRequest;
use App\Http\Resources\API\V1\Physician\CalendarAppointmentCollection;
use App\Http\Resources\API\V1\Physician\CalendarAppointmentResource;
use App\Http\Resources\API\V1\Physician\CalendarResource;
use App\Models\Appointment;
use App\Models\Facility;
use App\Models\FacilityPhysician;
use App\Models\MedicalAppointment;
use App\Models\Patient;
use App\Models\Physician;
use App\Models\User;
use Carbon\Carbon;
use DateInterval;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarAppointmentController extends Controller
{

    protected $physician, $patient;


    public function __construct()
    {
        $this->middleware('role:Physician')->only([
            'index',
            'show',
            'store',
        ]);
        // $this->user =  empty(auth()->id()) ? NULL : User::findOrFail(auth()->id());
        $this->physician = empty(auth()->id()) ? NULL : Physician::where('user_id', auth()->id())->firstOrFail();
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
            case 'today':

                $todayAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->where('appointment_date', $dateToday)
                    ->get();
                return new CalendarAppointmentCollection($todayAppointments); //RETORNA LA COLECCION
                break;

            case 'week':
                // condición

                if ($month == $monthnow) {

                    $weekstart =  $todaydatetime->startOfWeek()->toDateString(); // Inicio de la semana
                    $weekend = $todaydatetime->endOfWeek()->toDateString(); // Fin de la semana
                    $weekAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                        ->whereBetween('appointment_date', [$weekstart, $weekend])
                        ->get();

                    return new CalendarAppointmentCollection($weekAppointments);//RETORNA LA COLECCION
                }
                $weekYear = $year . '-' . $month . '-' . $day;
                $valor =  Carbon::createFromFormat('Y-m-d', $weekYear); //SE CREA EL FORMATO DE FECHA

                $weekstart = $valor->startOfWeek()->toDateString();// ENCUENTRA EL INICO DE LA SEMANA
                $weekend = $valor->endOfWeek()->toDateString();// ENCUENTRA EL FIN DE LA SEMANA

                $weekAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->whereBetween('appointment_date',  [$weekstart, $weekend])
                    ->get();

                return new CalendarAppointmentCollection($weekAppointments);//RETORNA LA COLECCION
                break;
            case 'month':
                // condición
                if ($month == $monthnow) {

                    $month_start = date('Y-m-01');// SE DETERMINA EL INICO DEL MES
                    $month_end = date('Y-m-t');//SE DETERMINA EL FIN DEL MES

                    $monthAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                        ->whereBetween('appointment_date', [$month_start, $month_end])
                        ->get();

                    return new CalendarAppointmentCollection($monthAppointments);//RETORNA LA COLECCION
                }
                $other_month = $year . '-' . $month . '-01';
                $other_month = Carbon::createFromFormat('Y-m-d', $other_month);//SE CREA EL FORMATO DE FECHA
                $other_month_end = $other_month->format('Y-m-t');//SE DETERMINA EL FIN DEL MES
                $monthAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->whereBetween('appointment_date', [$other_month->toDateString(), $other_month_end])
                    ->get();
                return new CalendarAppointmentCollection($monthAppointments);//RETORNA LA COLECCION
                break;

            default:
                # code...
                break;
        }
    }

    public function store(Request $request)
    {
        try {
            $user = User::where('phone_number', $request->phone_number)->first();

            DB::beginTransaction();

            if (!$user) {
                $user = User::create([
                    'country_code' => $request->country_code,
                    'phone_number' => $request->phone_number,
                ]);
            }
            $patientOfuser = count($user->patients);
            if ($patientOfuser >= 5) {
                return response()->json(['message' => 'no puedes crear mas pacientes'], 503);
            }
            $patient = Patient::where('full_name', $request->full_name)
                ->where('user_id', $user->id)
                ->first();
            if (!$patient) {
                $patient = Patient::create([
                    'user_id' => $user->id,
                    'full_name' => $request->full_name,
                    'country_code' => $request->country_code,
                    'emergency_number' => $request->emergency_number,
                ]);
            }
            $facility = Facility::where('id', $request->facility_id)->firstOrFail();

            $time = strtotime($request->appointment_time) + strtotime($facility->consultation_length);//SUMA LA DURACION DE LA CONSULTA A LA HORA DE LA CITA
            $date_time_end = date("H:i:s", $time);//SE LE DA EL FORMATO DE HORA

            $medicalAppointment = MedicalAppointment::where('appointment_date', $request->appointment_date)
                ->where('appointment_time', $request->appointment_time)->first();

            if ($medicalAppointment) {
                return response()->json(['message' => 'Fecha y horario no disponibles'], 503);
            }
            $medicalAppointment = MedicalAppointment::create([
                'appointment_date' => $request->appointment_date,
                'appointment_type' => $request->appointment_type,
                'appointment_time' => $request->appointment_time,
                'appointment_time_end' => $date_time_end,
                'patient_id' => $patient->id,
                'physician_id' => $this->physician->id,
                'facility_id' => $request->facility_id,
                'status'=>'Cita Agendada'
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
    public function facilityphysician()
    {
        $facility = FacilityPhysician::where('physician_id', $this->physician->id)->get();
        return $facility;
    }
    public function facility()
    {

    }
    public function update($id){
        $medicalAppointment = MedicalAppointment::where('id', $id)->get();
        $medicalAppointment->status = 'Cita canselada';
        $medicalAppointment->save();
    }
}
