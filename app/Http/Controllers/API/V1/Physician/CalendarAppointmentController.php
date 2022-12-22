<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\Physician;
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
        $todaydatetime = now();  //fecah y hora
        // $dateToday = getDate($todaydatetime); // fecha de hoy

        switch ($type) {
            case 'today':
                
                $todayAppointments = Appointment::where('physician_id', $this->physician->id)
                    ->where('appointment_date', $dateToday)
                    ->get();
                return $todayAppointments; // retornar colleción
                break;
            
            case 'week':
                break;

                // condición
                if ($month = al mes de hoy) {

                    $week =  $todaydatetime // week of the now

                    $weekAppointments = Appointment::where('physician_id', $this->physician->id)
                    ->where('appointment_date',  between(inicio de semana, fin de semana))
                    ->get();
                }

                $weekAppointments = Appointment::where('physician_id', $this->physician->id)
                    ->where('appointment_date',  between(first day of week($month), end day week($month)))
                    ->get();
    
            case 'month':
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
                break;
        }
    }

    public function show($id)
    {
        return "index calendar appointment" . $id;
        # pasar id del appointment
    }
}
