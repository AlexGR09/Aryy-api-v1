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
        $monthnow = $todaydatetime->format('m');

        switch ($type) {
            case 'today':

                $todayAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->where('appointment_date', $dateToday)
                    ->get();
                return new CalendarAppointmentCollection($todayAppointments);
                /* return $todayAppointments; */ // retornar colleción
                break;

            case 'week':
                // condición

                if ($month == $monthnow) {

                    $weekstart =  $todaydatetime->startOfWeek()->toDateString(); // Inicio de la semana
                    $weekend = $todaydatetime->endOfWeek()->toDateString(); // Fin de la semana
                    /* $weekAppointments = MedicalAppointment::all(); */
                    $weekAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                        ->whereBetween('appointment_date', [$weekstart, $weekend])
                        ->get();

                    return new CalendarAppointmentCollection($weekAppointments);
                    /* return $weekAppointments; */ // retornar colleción
                }
                $weekYear = $year . '-' . $month . '-' . $day;
                $valor =  Carbon::createFromFormat('Y-m-d', $weekYear);

                $weekstart = $valor->startOfWeek()->toDateString();
                $weekend = $valor->endOfWeek()->toDateString();

                $weekAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->whereBetween('appointment_date',  [$weekstart, $weekend])
                    ->get();

                return new CalendarAppointmentCollection($weekAppointments);
                /* return $weekAppointments; */   // retornar
                break;
                //FALTA CREAR EL CASO PARA EL MES Y ACOMODAR EL CODIGO  
            case 'month':
                // condición
                if ($month == $monthnow) {

                    $month_start = date('Y-m-01');
                    $month_end = date('Y-m-t');

                    /* return $month_start.'----------'.$month_end; // retornar */

                    $monthAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                        ->whereBetween('appointment_date', [$month_start, $month_end])
                        ->get();

                    return new CalendarAppointmentCollection($monthAppointments);
                    /* return $monthAppointments; */ // retornar

                }
                $other_month = $year . '-' . $month . '-01';
                $other_month = Carbon::createFromFormat('Y-m-d', $other_month);
                $other_month_end = $other_month->format('Y-m-t');
                $monthAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->whereBetween('appointment_date', [$other_month->toDateString(), $other_month_end])
                    ->get();
                return new CalendarAppointmentCollection($monthAppointments);
                /* return $monthAppointments; */

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

        $suma = strtotime($request->appointment_time) + strtotime($facility->consultation_length);
        $date_tiem_end = date("H:i:s", $suma);

        $medicalAppointment = MedicalAppointment::where('appointment_date', $request->appointment_date)
            ->where('appointment_time', $request->appointment_time)->first();

        if ($medicalAppointment) {
            return response()->json(['message' => 'Fecha y horario no disponibles'], 503);
        }
        $medicalAppointment = MedicalAppointment::create([
            'appointment_date' => $request->appointment_date,
            'appointment_type' => $request->appointment_type,
            'appointment_time' => $request->appointment_time,
            'appointment_time_end' => $date_tiem_end,
            'patient_id' => $patient->id,
            'physician_id' => $this->physician->id,
            'facility_id' => $request->facility_id,
        ]);

        DB::commit();
        return $medicalAppointment;

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
    public function facility(){

    }
}
