<?php

namespace App\Services;

use Carbon\Carbon;

class AppointmentService
{
    public function nextValidDayTime($currentDay, $attentionTime)
    {
        $hours = explode(' a ', $attentionTime);
        $startHour = Carbon::parse($hours[0]);
        $endHour = Carbon::parse($hours[1]);
        if ($currentDay->toDateTimeString() < $currentDay->copy()->setTime($startHour->format('H'), $startHour->format('i'), 0)->toDateTimeString()) {
            $currentDay = $currentDay->copy()->setTime($startHour->format('H'), $startHour->format('i'), 0);
        }

        if ($currentDay->toDateTimeString() > $currentDay->copy()->setTime($endHour->format('H'), $endHour->format('i'), 0)->toDateTimeString()) {
            $currentDay = $currentDay->addDay()->copy()->setTime($startHour->format('H'), $startHour->format('i'), 0);
        }

        return $currentDay;
    }

    public function generateValidHours($currentDay, $firstRangeStart, $firstRangeEnd, $secondRangeStart, $secondRangeEnd, $consultationLength)
    {
        $availableHours = [];
        // $availableHours[] = $currentDay;
        echo $currentDay->format('H:i');
        echo $firstRangeStart->format('H:i');
        echo $secondRangeEnd->format('H:i');

        // $currentDay->addMinutes($consultationLength);
        // return $currentDay->format('H:i');
        while (
                $currentDay->format('H:i')  >= $firstRangeStart->format('H:i') && 
                $currentDay->format('H:i') <= $secondRangeEnd->format('H:i') 
            ) {
                if(
                    $currentDay->format('H:i')  >= $firstRangeStart->format('H:i') && 
                    $currentDay->format('H:i') <= $firstRangeEnd->format('H:i') ||
                    $currentDay->format('H:i')  >= $secondRangeStart->format('H:i') && 
                    $currentDay->format('H:i') <= $secondRangeEnd->format('H:i') 
                ){
                    $tryToAllocateHour = $currentDay->copy()->addMinutes($consultationLength);
                    if(
                        $tryToAllocateHour->format('H:i')  >= $firstRangeStart->format('H:i') && 
                        $tryToAllocateHour->format('H:i') <= $firstRangeEnd->format('H:i') ||
                        $tryToAllocateHour->format('H:i')  >= $secondRangeStart->format('H:i') && 
                        $tryToAllocateHour->format('H:i') <= $secondRangeEnd->format('H:i') 
                    ){
                        $availableHours[] = $currentDay;
                        $currentDay = $currentDay->copy()->addMinutes($consultationLength);
                    } else {
                        $currentDay = $currentDay->copy()->addMinutes($consultationLength);
                    }

                    // var_dump($currentDay->format("H:i"));
                } else {
                    $currentDay = $secondRangeStart;
                    //  = $currentDay->copy()->addMinutes($consultationLength);
                }
        }

        return $availableHours;
    }
}
