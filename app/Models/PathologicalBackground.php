<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PathologicalBackground extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'previous_surgeries',
        'blood_transfusions',
        'diabetes',
        'heart_diseases',
        'blood_pressure',
        'thyroid_diseases',
        'cancer',
        'kidney_stones',
        'hepatitis',
        'trauma',
        'respiratory_diseases',
        'ets',
        'gastrointestinal_pathologies',
    ];

    public function medical_history()
    {
        return $this->hasOne(\App\Models\MedicalHistory::class);
    }
}
