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
        'is_verified'
    ];

    // RELACIÓN UNO UNO CON EL MODELO USARIO
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO ESPECIALIDADES
    public function specialties() {
        return $this->belongsToMany('App\Models\Specialty');
    }
    //RELACIÓN MUCHOS A MUCHOS CON EL MODELO MÉDICO-ESPECIALIDADES
    public function psychologist_specialties()
    {
        return $this->hasMany('App\Models\PhysicianSpecialty');
    }
    
    // public function diseases()
    // {
    //     return $this->hasMany('App\Models\DiseasesPhysician');
    // }

    // public function medical_services()
    // {
    //     return $this->hasMany('App\Models\MedicalServicesPhysician');
    // }

    // public function facilities()
    // {
    //     return $this->hasMany('App\Models\FacilitiesPhysician');
    // }
}
