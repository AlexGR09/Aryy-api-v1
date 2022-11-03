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
        'certificates',
        'social_networks',
        'biography',
        'recipe_template',
        'is_verified'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function specialties() {
        return $this->belongsToMany('App\Models\Specialty');
    }

    // public function specialties()
    // {
    //     return $this->hasMany('App\Models\SpecialtiesPhysician');
    // }

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
