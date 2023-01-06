<?php

namespace App\Http\Controllers;

use App\Models\Physician;
use App\Models\User;
use App\Services\AppointmentService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PhysicianAppointmentController extends Controller
{
    public function index( $user_physician, Request $request)
    {
        $physician = Physician::where('user_id', $user_physician)->first();
        $maxDays = 15;
        $currentDay = $request->since_day ? Carbon::parse($request->since_day) : \Carbon\Carbon::now();
        $availableDays = []; 

        $currentDay = (new AppointmentService)->nextValidDayTime($currentDay);
        
        $currentDayNumber = 0;
        $consultationLength = $physician->facilities[0]->consultation_length;
        $schedule = $physician->facilities[0]->schedule;
        while ($currentDayNumber <= $maxDays) {

            // Busca dia disponible en los definidos por el doctor
            $scheduleKey = 0;
            while(true){
                foreach ($schedule as $key => $availableDate) {
                    //Verifica si el dia va con el dia que esta en los que menciona el docotr
                    if ($currentDay->format('l') === $availableDate->day) {
                        $scheduleKey = $key;
                        $currentDayNumber += 1;
                        break 2;
                    } else{
                        //Recorre un dia
                        $currentDay->addDay();                        
                    }
                }
            }
        
            $restHours = explode(" a ", $schedule[$scheduleKey]->rest_hours);
            $restStartHour = Carbon::parse($restHours[0]);
            $restEndtHour = Carbon::parse($restHours[1]);

            $hours = explode(" a ", $schedule[$scheduleKey]->attention_time);
            $startHour = Carbon::parse($hours[0]);
            $endHour = Carbon::parse($hours[1]);

            $currentDay = $currentDay->copy()->setTime($startHour->hour, $startHour->minute, 0);
            
            $availableHours = (new AppointmentService)->generateValidHours(
                $currentDay, 
                $endHour,
                $consultationLength,
            );

            $schedule[0]->free_days = [];
            foreach ( $availableHours as $availableHour) {
                $availableDate = $physician->appointmentAvailability(
                    $currentDay, 
                    $restStartHour, 
                    $restEndtHour,
                    $startHour,
                    $endHour, 
                    $schedule, 
                    $availableHour            
                );
                is_null($availableDate) ? $availableDays[] = ['date' => $availableHour->toDateTimeString() , 'occupied' => false] : $availableDays[] = ['date' => $availableHour->toDateTimeString() , 'occupied' => true];
            }
            
            $currentDay->addDay();
        }
        return response()->json(['data' => $availableDays]);
    }
}
