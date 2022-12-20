<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prescription extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'symptom',
        'diagnosis',
        'treatment',
        'medication_instructions',
        'medical_examination',
        'laboratory_order',
    ];
}
