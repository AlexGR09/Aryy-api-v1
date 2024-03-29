<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO ESPECIALIDADES
    public function physicians()
    {
        return $this->belongsToMany(\App\Models\Physician::class, 'physician_specialty');
    }

    // public function physicians()
    // {
    //     return $this->hasMany('App\Models\SpecialtiesPhysician');
    // }

    public function medicalServicesSpecialty(){
        return $this->belongsTo(MedicalServicesSpecialty::class);
    }
}
