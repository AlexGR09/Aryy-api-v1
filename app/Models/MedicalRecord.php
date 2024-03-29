<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'note',
        'patient_id',
        'prescription_id',
    ];

    public function patient()
    {
        return $this->hasOne(\App\Models\Patient::class);
    }

    public function prescription()
    {
        return $this->hasOne(\App\Models\Prescription::class);
    }
}
