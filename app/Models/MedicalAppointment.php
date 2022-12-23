<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalAppointment extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'appointment_date',
        'appointment_time',
        'appointment_type',
        'phone_number',
        'emergency_number',
        'status',
        'patient_id',
        'physician_id'
    ];

    public function prescription()
    {
        return $this->hasOne(\App\Models\Prescription::class);
    }

    // RELACIÓN MUCHOS A UNO CON LA TABLA PHYSICIANS
    public function physician()
    {
        return $this->belongsTo(Physician::class);
    }

    // RELACIÓN MUCHOS A UNO CON LA TABLA PATIENTS
    public function patient()
    {
    return $this->belongsTo(Patient::class);
}
}
