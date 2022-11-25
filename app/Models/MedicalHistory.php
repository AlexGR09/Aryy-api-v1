<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'height',
        'weight',
        'imc',
        'bloody_type',
        'active_medication',
        'previous_medication',
        'vaccination_history',
        'allergi_patient_id'
    ];

    public function patient()
    {
        return $this->hasOne('App\Models\Patient');
    }
    public function allergypatient()
    {
        return $this->belongsTo('App\Models\AllergyPatient','id');
    }

    public function alergy()
    {
        return $this->belongsTo('App\Models\Alergy');
    }
}
