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
        'appointment_date_end',
        'appointment_time_end',
        'appointment_type',
        'status',
        'note',
        'patient_id',
        'physician_id',
        'facility_id',
        'prescription_id',
    ];

    public function scopeGreaterThanDate($query, $date, $time)
    {
        return $query->where('appointment_date', '>=', $date)
        ->where('appointment_time', '>=', $time);
    }

    public function scopeLowerThanDate($query, $date, $time)
    {
        return $query->where('appointment_date', '<=', $date)
        ->where('appointment_time', '<=', $time);
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

    // RELACIÓN UNO A MUCHOS CON LA TABLA PATIENTS
    public function facility()
    {
        return $this->belongsTo(Facility::class);
    }

    public function prescription()
    {
        return $this->belongsTo(Prescription::class);
    }
}
