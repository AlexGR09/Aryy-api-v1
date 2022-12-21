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
}
