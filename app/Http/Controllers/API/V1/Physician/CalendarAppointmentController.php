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
        $year = $request->year;
        $todaydatetime = today();  //fecah y hora
        $dateToday = $todaydatetime->toDateString(); // fecha de hoy
        $monthknow = $todaydatetime->format('m');

        switch ($type) {
            case 'today':

                $todayAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->where('appointment_date', $dateToday)
                    ->get();
                return $todayAppointments; // retornar colleción
                break;

            case 'week':
                // condición

                if ($month == $monthknow) {

                    $weekstart =  $todaydatetime->startOfWeek()->toDateString(); // week of the now
                    $weekend = $todaydatetime->endOfWeek()->toDateString(); //

                    $weekAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                        ->whereBetween('appointment_date', [$weekstart, $weekend])
                        ->get();

                    return $weekAppointments; // retornar colleción
                }
                $weekYear = $year . '-' . $month;
                $valor =  Carbon::createFromFormat('Y-m', $weekYear);
                $weekAppointments = MedicalAppointment::where('physician_id', $this->physician->id)
                    ->whereBetween('appointment_date',  [$valor->startOfWeek(), $valor->endOfWeek()])
                    ->get();
                return $weekAppointments; // retornar
                break;

                /*             case 'month':
                // condición
                if ($month = al mes de hoy) {

                    $week =  $todaydatetime // week of the now

                    $weekAppointments = Appointment::where('physician_id', $this->physician->id)
                    ->where('appointment_date',  between(inicio de mes, fin de mes))
                    ->get();
                }

                $weekAppointments = Appointment::where('physician_id', $this->physician->id)
                    ->where('appointment_date',  between(first day of $month, end day $month))
                    ->get();

                break;
            
            default:
                # code...
                break; */
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
}
