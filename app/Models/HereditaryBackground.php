<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HereditaryBackground extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'diabetes',
        'heart_diseases',
        'blood_pressure',
        'thyroid_diseases',
        'cancer',
        'kidney_stones'
    ];

    public function medical_history()
    {
        return $this->hasOne('App\Models\MedicalHistory');
    }

    protected $casts = [
        'diabetes'=>'object',
        'heart_diseases'=>'object',
        'blood_pressure'=>'object',
        'thyroid_diseases'=>'object',
        'cancer'=>'object',
        'kidney_stones'=>'object'
    ];
}
