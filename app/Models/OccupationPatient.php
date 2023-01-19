<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OccupationPatient extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'occupation_patient';

    public function patients()
    {
        return $this->belongsTo(\App\Models\Patient::class)->withPivot('patient_id');
    }

    public function occupations()
    {
        return $this->belongsTo(\App\Models\Occupation::class)->withPivot('occupation_id');
    }
}
