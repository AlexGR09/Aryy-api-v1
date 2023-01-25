<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vital_sign_id',
        'symptom',
        'diagnosis',
        'medical_examination',
        'treatment',
        'laboratory_studies',
        'cabinet_studies',
    ];

    protected $casts = [
        'treatment' => 'array',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function vitalSigns()
    {
        return $this->belongsTo(VitalSing::class);
    }

    public function medicalappointment()
    {
        return $this->hasOne(MedicalAppointment::class);
    }

    public function vitalSign()
    {
        return $this->belongsTo(VitalSign::class);
    }
}
