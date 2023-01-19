<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ObgynBackground extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_menstruation',
        'last_menstruation',
        'bleeding',
        'pain',
        'intimate_hygiene',
        'cervical_discharge',
        'sex',
        'pregnancies',
        'cervical_cancer',
        'breast_cancer',
        'sexually_active',
        'family_planning',
        'hormone_replacement_therapy',
        'last_pap_smear',
        'last_mammography',
    ];

    public function medical_history()
    {
        return $this->hasOne(\App\Models\MedicalHistory::class);
    }
}
