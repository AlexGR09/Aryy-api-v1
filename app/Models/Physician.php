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
        'certificates',
        'social_networks',
        'biography',
        'recipe_template',
        'is_verified',
    ];

    protected $casts = [
        'social_networks' => 'array',
        'certificates' => 'array',
    ];

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
}
