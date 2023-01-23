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
        'blood_type',
        'active_medication',
        'previous_medication',
        'vaccination_history',
        'allergy_patient_id',
        'pathological_background_id',
        'non_pathological_background_id',
        'hereditary_background_id',
        'vaccination_history_id',
        'perinatal_background_id',
        'postnatal_background_id',
        'gynecological_history_id',
    ];

    protected $casts = [
        'weight' => 'object',
        'height' => 'object',
    ];

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }

    public function allergyPatient()
    {
        return $this->belongsTo('App\Models\AllergyPatient', 'allergy_patient_id', 'id');
    }

    public function pathologicalBackground()
    {
        return $this->belongsTo(PathologicalBackground::class, 'pathological_background_id', 'id');
    }

    public function nonpathologicalbackground()
    {
        return $this->belongsTo('App\Models\NonPathologicalBackground', 'non_pathological_background_id', 'id');
    }

    public function hereditarybackground()
    {
        return $this->belongsTo('App\Models\HereditaryBackground', 'hereditary_background_id', 'id');
    }

    public function vaccinationhistory()
    {
        return $this->hasMany('App\Models\MedicalHistoryVaccination', 'vaccination_history_id', 'id');
    }

    public function pyschologicalBackground()
    {
        return $this->belongsTo(PyschologicalBackground::class);
    }

    public function perinatalBackground()
    {
        return $this->belongsTo(PerinatalBackground::class);
    }

    public function postnatal_background()
    {
        return $this->belongsTo(PostnatalBackground::class);
    }

    public function ObgynBackground()
    {
        return $this->belongsTo(ObgynBackground::class);
    }
}
