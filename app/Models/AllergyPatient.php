<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllergyPatient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'food_allergy',
        'drug_allergy',
        'environmental_allergy',
    ];

    protected $casts = [
        'food_allergy' => 'array',
        'drug_allergy' => 'array',
        'environmental_allergy' => 'array',
    ];

    public function medical_history()
    {
        return $this->hasOne(\App\Models\MedicalHistory::class);
    }
}
