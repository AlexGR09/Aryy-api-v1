<?php

namespace App\Http\Controllers\API\V1\Physician;

use App\Http\Controllers\Controller;
use App\Models\MedicalAppointment;
use App\Models\Patient;
use App\Models\Physician;
use App\Services\AppointmentService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PhysicianAppointmentController extends Controller
{
    public function index(Physician $physician, Request $request)
    {
        $maxDays = 15;
        $currentDay = $request->since_day ? Carbon::parse($request->since_day) : \Carbon\Carbon::now();
        $availableDays = [];
        $availableDayIndex = 0;

        $currentDayNumber = 0;
        $consultationLength = $physician->facilities[0]->consultation_length;
        $schedule = $physician->facilities[0]->schedule->week;
        while ($currentDayNumber <= $maxDays) {
            // Busca dia disponible en los definidos por el doctor
            $scheduleKey = 0;
            while (true) {
                foreach ($schedule as $key => $availableDate) {
                    //Verifica si el dia va con el dia que esta en los que menciona el docotr
                    if ($currentDay->format('l') === $availableDate->day) {
                        $scheduleKey = $key;
                        $currentDayNumber += 1;
                        break 2;
                    }
                    //Recorre un dia
                }
                $currentDay->addDay();
            }
            $currentDay = (new AppointmentService)->nextValidDayTime($currentDay, $schedule[$scheduleKey]->attention_time, $schedule[$scheduleKey]->rest_hours);

            $restHours = explode(' a ', $schedule[$scheduleKey]->rest_hours);
            $restStartHour = Carbon::parse($restHours[0]);
            $restEndtHour = Carbon::parse($restHours[1]);

            $hours = explode(' a ', $schedule[$scheduleKey]->attention_time);
            $startHour = Carbon::parse($hours[0]);
            $endHour = Carbon::parse($hours[1]);

            $currentDay = $currentDay->copy()->setTime($startHour->hour, $startHour->minute, 0);
            $availableHours = (new AppointmentService)->generateValidHours(
                $currentDay,
                $endHour,
                hourMinuteToMinutes($consultationLength),
            );

            $schedule[0]->free_days = [];
            $availableDays[$availableDayIndex] = ['available_hours' => []];
            $availableDays[$availableDayIndex] = ['occupied_hours' => []];
            foreach ($availableHours as $availableHour) {
                $availableDate = $physician->appointmentAvailability(
                    $currentDay,
                    $restStartHour,
                    $restEndtHour,
                    $startHour,
                    $endHour,
                    $physician->facilities[0]->schedule->free_days,
                    $availableHour
                );
                $availableDays[$availableDayIndex]['date'] = $availableHour->format('Y-m-d');

                if (is_null($availableDate)) {
                    $availableDays[$availableDayIndex]['available_hours'][] = ['hour' => $availableHour->format('H:i'), 'occupied' => is_null($availableDate) ? true : false];
                } else {
                    $availableDays[$availableDayIndex]['occupied_hours'][] = ['hour' => $availableHour->format('H:i'), 'occupied' => is_null($availableDate) ? true : false];
                }
            }
            $availableDayIndex += 1;
            $currentDay->addDay();
        }

        return response()->json(['data' => $availableDays]);
    }

    public function store(Patient $patient, Physician $physician, Request $request)
    {
        $patientExists = Patient::where('id', $patient->id)->where('user_id', auth()->id())->exists();
        if (! $patientExists) {
            return conflict('El paciente no pertenece al usuario', []);
        }
        $maxDays = 15;

        $date = Carbon::parse($request->appointment_date);
        $time = Carbon::parse($request->appointment_time);

        $availableDays = [];

        $currentDayNumber = 0;
        $consultationLength = $physician->facilities[0]->consultation_length;
        $schedule = $physician->facilities[0]->schedule->week;
        while ($currentDayNumber <= $maxDays) {
            // Busca dia disponible en los definidos por el doctor
            $scheduleKey = 0;
            $found = false;
            foreach ($schedule as $key => $availableDate) {
                //Verifica si el dia va con el dia que esta en los que menciona el docotr
                if ($date->format('l') === $availableDate->day) {
                    $scheduleKey = $key;
                    $found = true;
                }
            }
            if (! $found) {
                return conflict('Selecciona un dia valido', []);
            }
            $restHours = explode(' a ', $schedule[$scheduleKey]->rest_hours);
            $restStartHour = Carbon::parse($restHours[0]);
            $restEndtHour = Carbon::parse($restHours[1]);

            $hours = explode(' a ', $schedule[$scheduleKey]->attention_time);
            $startHour = Carbon::parse($hours[0]);
            $endHour = Carbon::parse($hours[1]);

            $availableDate = $physician->isAvailableDateTime(
                $date,
                $time,
                $restStartHour,
                $restEndtHour,
                $startHour,
                $endHour,
                $physician->facilities[0]->schedule->free_days,
            );

            $firstAppointment = false;

            $patient
                ->has('medical_appointments')
                ->first()
                ? $firstAppointment = false
                : $firstAppointment = true;

            if (is_null($availableDate)) {
                $dateTimeEnd = Carbon::parse($date->format('Y-m-d').' '.$time->format('H:i'))
                    ->addMinutes(hourMinuteToMinutes($consultationLength))
                    ->format('H:i');
                $cost = 0;
                $firstAppointment ? $cost = $physician->first_time_consultation : $cost = $physician->subsequent_consultation;

                $medicalAppointment = MedicalAppointment::create([
                    'patient_id' => $patient->id,
                    'physician_id' => $physician->id,
                    'facility_id' => $physician->facilities[0]->id,
                    'status' => 'scheduled',
                    'appointment_date' => $date->format('Y-m-d'),
                    'appointment_time' => $time->format('H:i'),
                    'appointment_time_end' => $dateTimeEnd,
                    'appointment_type' => $firstAppointment ? 'Primera consulta' : 'Subsecuente',
                    'note' => $request->note,
                    'relationship' => $request->relationship,
                    'cost' => $cost,
                ]);

                return ok('Se agendo correctamente', $medicalAppointment);
            }

            return conflict('Ya existe una cita en ese horario', []);
        }

        return response()->json(['data' => $availableDays]);
    }

    public function update(Patient $patient, Physician $physician, MedicalAppointment $medicalAppointment, Request $request)
    {
        $patientExists = Patient::where('id', $patient->id)->where('user_id', auth()->id())->exists();
        if (! $patientExists) {
            return conflict('El paciente no pertenece al usuario', []);
        }
        $maxDays = 15;

        $date = Carbon::parse($request->appointment_date);
        $time = Carbon::parse($request->appointment_time);

        $availableDays = [];

        $currentDayNumber = 0;
        $consultationLength = $physician->facilities[0]->consultation_length;
        $schedule = $physician->facilities[0]->schedule->week;
        while ($currentDayNumber <= $maxDays) {
            // Busca dia disponible en los definidos por el doctor
            $scheduleKey = 0;
            $found = false;
            foreach ($schedule as $key => $availableDate) {
                //Verifica si el dia va con el dia que esta en los que menciona el docotr
                if ($date->format('l') === $availableDate->day) {
                    $scheduleKey = $key;
                    $found = true;
                }
            }
            if (! $found) {
                return conflict('Selecciona un dia valido', []);
            }
            $restHours = explode(' a ', $schedule[$scheduleKey]->rest_hours);
            $restStartHour = Carbon::parse($restHours[0]);
            $restEndtHour = Carbon::parse($restHours[1]);

            $hours = explode(' a ', $schedule[$scheduleKey]->attention_time);
            $startHour = Carbon::parse($hours[0]);
            $endHour = Carbon::parse($hours[1]);

            $availableDate = $physician->isAvailableDateTime(
                $date,
                $time,
                $restStartHour,
                $restEndtHour,
                $startHour,
                $endHour,
                $physician->facilities[0]->schedule->free_days,
            );

            $firstAppointment = false;

            $patient
                ->has('medical_appointments')
                ->first()
                ? $firstAppointment = false
                : $firstAppointment = true;

            if (is_null($availableDate)) {
                $dateTimeEnd = Carbon::parse($date->format('Y-m-d').' '.$time->format('H:i'))
                    ->addMinutes(hourMinuteToMinutes($consultationLength))
                    ->format('H:i');
                $updatedMedicalAppointment = tap($medicalAppointment)->update([
                    'physician_id' => $physician->id,
                    'facility_id' => $physician->facilities[0]->id,
                    'status' => 'scheduled',
                    'appointment_date' => $date->format('Y-m-d'),
                    'appointment_time' => $time->format('H:i'),
                    'appointment_time_end' => $dateTimeEnd,
                    'note' => $request->note,
                    'relationship' => $request->relationship,
                ]);

                return ok('Se agendo correctamente', $updatedMedicalAppointment);
            }

            return conflict('Ya existe una cita en ese horario', []);
        }

        return response()->json(['data' => $availableDays]);
    }

    public function destroy(Patient $patient, MedicalAppointment $medicalAppointment)
    {
        $patientExists = Patient::where('id', $patient->id)->where('user_id', auth()->id())->exists();
        if (! $patientExists) {
            return conflict('El paciente no pertenece al usuario', []);
        }
        $medicalAppointmentDeleted = $medicalAppointment->where('id', $medicalAppointment->id)->where('patient_id', $patient->id)->delete();
        if (! $medicalAppointmentDeleted) {
            return ok('Hubo un problema al borrar la cita', []);
        }

        return ok('', $medicalAppointment);
    }
}
