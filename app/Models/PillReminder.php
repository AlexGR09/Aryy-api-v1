<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PillReminder extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'drug',
        'doce',
        'frecuency',
        'start_treatment',
        'end_treatment',
        'first_take',
        'instruction',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
