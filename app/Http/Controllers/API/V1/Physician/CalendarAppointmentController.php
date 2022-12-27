<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\V1\Physician\AppointmentRequest;
use App\Http\Resources\API\V1\Physician\CalendarAppointmentCollection;
use App\Http\Resources\API\V1\Physician\CalendarAppointmentResource;
use App\Models\Appointment;
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

    public function __construct()
    {
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

                    $weekstart =  $todaydatetime->startOfWeek()->toDateString(); // week of the now
                    $weekend = $todaydatetime->endOfWeek()->toDateString(); //
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

    public function store(AppointmentRequest $request)
    {
        /* try { */

            DB::beginTransaction();
            $user = new User();
            $user->country_code = $request->country_code;
            $user->phone_number = $request->phone_number;
            $user->save();

            $patient = Patient::create([
                'full_name' => $request->full_name,
                'country_code' => $request->country_code,
                'emergency_number'=>$request->emergency_number,
                'city_id'=>$request->city_id,
                'user_id'=>$user->id,
            ]);
            /* $medicalAppointment = MedicalAppointment::create([
                'appointment_date' => $request->appointment_date,
                'appointment_type' => $request->appointment_type,
                'appointment_time' => $request->appointment_time,
                'patient_id' => $patient->id,
                'physician_id' => $this->physician,
                'facility_id' => $request->facility_id,
            ]); */

            DB::commit();
            //return (new TaxDataResource($tax_data))->additional(['message' => 'Informacion guardada con exito.']);
        /* } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        } */
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
}
