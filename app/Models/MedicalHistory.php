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
        'allergi_patient_id',
        'pathological_backgorund_id',
        'hereditary_background_id',
        'vaccination_history_id',
    ];

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function allergypatient()
    {
        return $this->hasOne('App\Models\AllergyPatient', 'id');
    }

    public function pathologicalbackground()
    {
        return $this->belongsTo('App\Models\PathologicalBackground', 'id');
    }

    public function nonpathologicalbackground()
    {
        return $this->belongsTo('App\Models\NonPathologicalBackground', 'id');
    }

    public function hereditarybackground()
    {
        return $this->belongsTo('App\Models\HereditaryBackground', 'id');
    }

    public function vaccinationhistory()
    {
        return $this->belongsTo('App\Models\VaccinationHistory', 'id');
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'weight' => 'object',
        'height' => 'object',
    ];
}
