<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Http\Resources\API\V1\Physician\CalendarAppointmentResource;
use App\Models\Appointment;
use App\Models\MedicalAppointment;
use App\Models\Physician;
use Carbon\Carbon;
use Illuminate\Http\Request;

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
                return $todayAppointments; // retornar colleción
                break;

            case 'week':
                // condición

                if ($month == $monthnow) {

                    $weekstart =  $todaydatetime->startOfWeek()->toDateString(); // week of the now
                    $weekend = $todaydatetime->endOfWeek()->toDateString(); //

                    $weekAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                        ->whereBetween('appointment_date', [$weekstart, $weekend])
                        ->get();

                    return $weekAppointments; // retornar colleción
                }
                $weekYear = $year . '-' . $month . '-' . $day;
                $valor =  Carbon::createFromFormat('Y-m-d', $weekYear);
                $weekAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->whereBetween('appointment_date',  [$valor->startOfWeek()->toDateString(), $valor->endOfWeek()->toDateString()])
                    ->get();
                return $weekAppointments; // retornar
                break;
                //FALTA CREAR EL CASO PARA EL MES Y ACOMODAR EL CODIGO  
            case 'month':
                // condición
                if ($month == $monthnow) {

                    $month_start = date('Y-m-01');
                    $month_end = date('Y-m-t');

                    /* return $month_start.'----------'.$month_end; // retornar */

                    $weekAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                        ->whereBetween('appointment_date', [$month_start, $month_end])
                        ->get();

                    return $weekAppointments; // retornar

                }
                return $month;
                /* $weekAppointments = Appointment::where('physician_id', $this->physician->id)
                    ->whereBetween('appointment_date',[,])
                    ->get(); */

                break;

            default:
                # code...
                break;
        }
    }

    public function show($id)
    {
        try {
            $appointment = $this->physician->medical_appointments()
                ->where('id', $id)
                ->first();

            return (new CalendarAppointmentResource($appointment))->additional(['message' => 'Perfil de paciente creado con éxito.']);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th->getMessage()], 503);
        }
    }
}
