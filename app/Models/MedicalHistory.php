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
        'allergy_patient_id',
        'pathological_backgorund_id',
        'hereditary_background_id',
        'vaccination_history_id',
        'perinatal_background_id',
        'postnatal_backgroun_id',
        'gynecological_history_id',
    ];

    public function patient()
    {
        return $this->belongsTo(\App\Models\Patient::class);
    }

    public function allergyPatient()
    {
        return $this->belongsTo('App\Models\AllergyPatient', 'allergy_patient_id', 'id');
    }

    public function pathologicalbackground()
    {
        return $this->belongsTo('App\Models\PathologicalBackground', 'pathological_background_id', 'id');
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
        return $this->belongsTo('App\Models\VaccinationHistory', 'vaccination_history_id', 'id');
    }

    public function pyschologicalbackground()
    {
        return $this->belongsTo('App\Models\PyschologicalBackground');
    }

    public function perinatalBackground()
    {
        return $this->belongsTo(PerinatalBackground::class);
    }

    public function postnatal_background()
    {
        return $this->belongsTo(PostnatalBackground::class);
    }

    public function gynecologyBackground(){
        return $this->belongsTo('App\Models\ObgynBackground');
    }


    protected $casts = [
        'weight' => 'object',
        'height' => 'object',
    ];
}
