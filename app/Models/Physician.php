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
        'first_time_consultation',
        'subsequent_consultation',
        'languages',
        'is_verified'
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
        return $this->hasMany(\App\Models\PhysicianSpecialty::class);
    }
    // RELACIÓN UNO A MUCHOS CON LA TABLA MEDICAL APPOINTMENTS
    public function medical_appointments() 
    {
        return $this->hasMany(MedicalAppointment::class);
    }

    // public function diseases()
    // {
    //     return $this->hasMany('App\Models\DiseasesPhysician');
    // }

    // public function medical_services()
    // {
    //     return $this->hasMany('App\Models\MedicalServicesPhysician');
    // }

    public function facilities()
    {
        return $this->belongsToMany(\App\Models\Facility::class, 'facility_physician');
    }

    public function score()
    {
        return $this->belongsTo(Score::class,'user_id','user_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class,'user_id','user_id');
    }
    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO ESPECIALIDADES
    public function medicalServices()
    {
        return $this->belongsToMany(MedicalService::class, 'medical_service_physician');
    }

    public function diseases()
    {
        return $this->belongsToMany(Disease::class, 'disease_physician');
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
        $schedule, 
        $availableHour)
    {
        return $this->appointments()->where('appointment_date', '>=', $currentDay->copy()->setTime($startHour->hour, $startHour->minute, 0))
        ->whereNotBetween('appointment_date', [ $currentDay->copy()->setTime($restStartHour->hour, $restStartHour->minute,0), $currentDay->copy()->setTime($restEndtHour->hour, $restEndtHour->minute,0)] )
        ->where('appointment_date', '<=', $currentDay->copy()->setTime($endHour->hour, $endHour->minute, 0))
        ->whereNotIn('appointment_date', $schedule[0]->free_days)
        ->where('appointment_date',  $availableHour)
        ->first();
    }
}
