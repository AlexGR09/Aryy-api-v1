<?php

namespace App\Services;

class AppointmentService
{
    public function nextValidDayTime($currentDay)
    {
        if ($currentDay->toDateTimeString() < $currentDay->copy()->setTime(9, 0, 0)->toDateTimeString()) {
            $currentDay = $currentDay->copy()->setTime(9, 0, 0);
        }

        if ($currentDay->toDateTimeString() > $currentDay->copy()->setTime(21, 0, 0)->toDateTimeString()) {
            $currentDay = $currentDay->addDay()->copy()->setTime(21, 0, 0);
        }

        return $currentDay;
    }

    public function generateValidHours($currentDay, $endHour, $consultationLength)
    {
        $availableHours = [];
        $availableHours[] = $currentDay;
        while ($currentDay->format('H:i') <= $endHour->format('H:i')) {
            $availableHours[] = $currentDay;
            $currentDay = $currentDay->copy()->addMinutes($consultationLength);
        }

        return $availableHours;
    }
}
