<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Physician extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'professional_name',
        'gender',
        'certificates',
        'social_networks',
        'biography',
        'recipe_template',
        'languages',
        'is_verified',
    ];

    protected $hidden = [
        'appointments',
        'pivot',

    ];

    protected $casts = [
        'social_networks' => 'array',
        'certificates' => 'array',
    ];

    public function searchNextAvailableAppointment()
    {
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class, 'user_id_physician', 'user_id');
    }

    // RELACIÓN UNO UNO CON EL MODELO USUARIO
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO ESPECIALIDADES
    public function specialties()
    {
        return $this->belongsToMany(\App\Models\Specialty::class, 'physician_specialty');
    }

    //RELACIÓN MUCHOS A MUCHOS CON EL MODELO MÉDICO-ESPECIALIDADES
    public function physician_specialty()
    {
        return $this->hasMany(PhysicianSpecialty::class);
    }

    // RELACIÓN UNO A MUCHOS CON LA TABLA MEDICAL APPOINTMENTS
    public function medical_appointments()
    {
        return $this->hasMany(MedicalAppointment::class);
    }

    /// RELACIÓN MUCHOS A MUCHOS CON EL MODELO MEDICAL SERVICES
    public function medical_services()
    {
        return $this->belongsToMany(MedicalService::class, 'medical_service_physician');
    }

    //RELACIÓN MUCHOS A MUCHOS CON EL MODELO MÉDICO-SERVICIOS
    public function medical_service_physician()
    {
        return $this->hasMany(MedicalServicePhysician::class);
    }

    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO DISEASES
    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'disease_physician');
    }

    // UN MÉDICO TIENE MUCHOS CUESTIONARIOS
    public function personalized_questionnaires()
    {
        return $this->hasMany(PersonalizedQuestionnaire::class);
    }

    public function facilities()
    {
        return $this->belongsToMany(\App\Models\Facility::class, 'facility_physician');
    }

    public function score()
    {
        return $this->belongsTo(Score::class, 'physician_id', 'physician_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'physician_id', 'id');
    }

    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO ESPECIALIDADES
    public function medicalServices()
    {
        return $this->belongsToMany(MedicalService::class, 'medical_service_physician');
    }

    public function specialty()
    {
        return $this->belongsToMany(Specialty::class, 'physician_specialty');
    }

    public function facilitiesCoordinates()
    {
        return $this->belongsToMany(\App\Models\Facility::class, 'facility_physician')->select(['coordinates']);
    }

    public function appointmentAvailability(
        $currentDay,
        $restStartHour,
        $restEndtHour,
        $startHour,
        $endHour,
        $freeDays,
        $availableHour)
    {
        $currentSearch = $availableHour->copy()->format('Y-m-d');

        return $this->medical_appointments()
        ->where('appointment_date', '>=', $currentDay->copy()->format('Y-m-d'))
        ->where('appointment_time', '>=', $currentDay->copy()->setTime($startHour->hour, $startHour->minute, 0)->format('H:i'))
        ->where('appointment_date', '<=', $currentDay->copy()->format('Y-m-d'))
        ->where('appointment_time', '<=', $currentDay->copy()->setTime($endHour->hour, $endHour->minute, 0)->format('H:i'))

        // ->whereNotBetween('appointment_time', [
        //     $currentDay->copy()->setTime($restStartHour->hour, $restStartHour->minute, 0)->format('H:i'),
        //     $currentDay->copy()->setTime($restEndtHour->hour, $restEndtHour->minute, 0)->format('H:i')
        //     ])

        ->whereNotIn('appointment_date', $freeDays)
        ->where('appointment_date', $currentSearch)
        ->where('appointment_time', $availableHour->copy()->format('H:i'))
        ->first();
    }

    public function isAvailableDateTime(
        $currentDate,
        $currentTime,
        $restStartHour,
        $restEndtHour,
        $startHour,
        $endHour,
        $freeDays)
    {
        return $this->medical_appointments()
        ->where('appointment_date', '>=', $currentDate->copy()->format('Y-m-d'))
        ->where('appointment_time', '>=', $currentDate->copy()->setTime($startHour->hour, $startHour->minute, 0)->format('H:i'))
        ->where('appointment_date', '<=', $currentDate->copy()->format('Y-m-d'))
        ->where('appointment_time', '<=', $currentDate->copy()->setTime($endHour->hour, $endHour->minute, 0)->format('H:i'))
        ->where('appointment_date', $currentDate->copy()->format('Y-m-d'))
        ->where('appointment_time', $currentTime->copy()->format('H:i'))
        ->whereNotBetween('appointment_time', [
            $currentDate->copy()->setTime($restStartHour->hour, $restStartHour->minute, 0)->format('H:i'),
            $currentDate->copy()->setTime($restEndtHour->hour, $restEndtHour->minute, 0)->format('H:i'),
        ])
        ->whereNotIn('appointment_date', $freeDays)
        ->first();
    }
}
