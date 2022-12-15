<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Patient extends Model
{
    use HasFactory, SoftDeletes,HasRoles,HasApiTokens;

    protected $fillable = [
        'user_id',
        'address',
        'zip_code',
        'country_code',
        'emergency_number',
        'id_card',
    ];

    // RELACIÓN UNO UNO CON USUARIO
    // public function user()
    // {
    //     return $this->belongsTo(\App\Models\User::class);
    // }

    // RELACIÓN MUCHOS A UNO CON SEGUROS MÉDICOS
    public function health_insurance()
    {
        return $this->belongsTo(\App\Models\HealthInsurance::class);
    }

    // RELACIÓN MUCHOS A UNO CON CIUDADES
    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    public function medical_history()
    {
        return $this->belongsTo(\App\Models\MedicalHistory::class);
    }

    public function occupationpatient()
    {
        return $this->hasMany(\App\Models\OccupationPatient::class)->with('Occupation');
    }

    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO USER
    public function users() {
        return $this->belongsToMany(\App\Models\User::class, 'patient_user');
    }

    // public function ocupations()
    // {
    //     return $this->hasMany('App\Models\OcupationPatient');
    // }

    // public function health_insurance()
    // {
    //     return $this->belongsTo('App\Models\HealthInsurance');
    // }

    // public function medical_records()
    // {
    //     return $this->belongsTo('App\Models\MedicalRecord');
    // }

    // public function medical_history()
    // {
    //     return $this->belongsTo('App\Models\MedicalHistory');
    // }
    protected $casts = [
        'address' => 'object',
        'id_card' => 'object',
    ];
}
