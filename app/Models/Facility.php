<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'location',
        'phone',
        'extension',
        'zipcode',
        'schedule',
        'type_schedule',
        'consultation_length',
        'accessibility_and_others',
        'city_id',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'location' => 'object',
        'schedule' => 'object',
        'accessibility_and_others' => 'object',
    ];

    public function physicians()
    {
        return $this->belongsToMany(\App\Models\Physician::class, 'facility_physician');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function city()
    {
        return $this->belongsTo(\App\Models\City::class);
    }

    // RELACIÓN UNO A MUCHOS CON LA TABLA MEDICAL APPOINTMENTS
    public function medical_appointments() 
    {
        return $this->hasMany(MedicalAppointment::class);
    }
}
