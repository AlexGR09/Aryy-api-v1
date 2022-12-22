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

    protected $casts = [
        'social_networks' => 'array',
        'certificates' => 'array'
    ];

    // RELACIÓN UNO UNO CON EL MODELO USUARIO
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO ESPECIALIDADES
    public function specialties() {
        return $this->belongsToMany('App\Models\Specialty', 'physician_specialty');
    }
    //RELACIÓN MUCHOS A MUCHOS CON EL MODELO MÉDICO-ESPECIALIDADES
    public function physician_specialty()
    {
        return $this->hasMany('App\Models\PhysicianSpecialty');
    }
    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO MEDICAL SERVICES
    public function medical_services()
    {
        return $this->belongsToMany('App\Models\MedicalService', 'medical_service_physician');
    }
    //RELACIÓN MUCHOS A MUCHOS CON EL MODELO MÉDICO-SERVICIOS
    public function medical_service_physician()
    {
        return $this->hasMany('App\Models\MedicalServicePhysician');
    }
    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO DISEASES
    public function diseases()
    {
        return $this->belongsToMany('App\Models\Disease', 'disease_physician');
    }
    // RELACIÓN UNO A MUCHOS CON LA TABLA MEDICAL APPOINTMENTS
    public function medical_appointments() 
    {
        return $this->hasMany(MedicalAppointment::class);
    }

    
    public function facilities()
    {
        return $this->belongsToMany('App\Models\Facility', 'facility_physician');
    }

}
