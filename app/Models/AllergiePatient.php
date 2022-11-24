<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AllergiePatient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'food_allergy',
        'drug_allergy',
        'environmental_allergy'
    ];

    public function medical_history()
    {
        return $this->hasOne('App\Models\MedicalHistory');
    }
}
