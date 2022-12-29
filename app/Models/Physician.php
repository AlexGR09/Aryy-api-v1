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
<<<<<<< HEAD
        'is_verified',
        'first_time_consultation',
        'subsequent_consultation'
=======
        'first_time_consultation',
        'subsequent_consultation',
        'languages',
        'is_verified'
>>>>>>> facf14e15f8ce88f314c3230a65e73c71b46af42
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
        return $this->hasMany(Appointment::class, 'user_id', 'user_id');
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

    public function facilitiesCoordinates()
    {
        return $this->belongsToMany(\App\Models\Facility::class, 'facility_physician')->select(['coordinates']);
    }
}
