<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Physician extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'professional_name',
        'country_code',
        'phone_number',
        'gender',
        'c1_license',
        'a1_license',
        'city_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function specialities()
    {
        return $this->hasMany('App\Models\SpecialitiesPhysician');
    }

    public function diseases()
    {
        return $this->hasMany('App\Models\DiseasesPhysician');
    }

    public function medical_services()
    {
        return $this->hasMany('App\Models\MedicalServicesPhysician');
    }

    public function facilities()
    {
        return $this->hasMany('App\Models\FacilitiesPhysician');
    }
}
