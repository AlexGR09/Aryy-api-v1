<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Physician extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'professional_name',
        'phone_number',
        'country_code',
        'gender',
        'bussiness_email',
        'c1_license',
        'a1_license'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function speciality(){
        return $this->hasMany('App\Models\SpecialitiesPhysician');
    }

    public function diseases(){
        return $this->hasMany('App\Models\DiseasesPhysician');
    }

    public function medical_services(){
        return $this->hasMany('App\Models\MedicalServicesPhysician');
    }

    public function facilities(){
        return $this->hasMany('App\Models\FacilitiesPhysician');
    }
}
