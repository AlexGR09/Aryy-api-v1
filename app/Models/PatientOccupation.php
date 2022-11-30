<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientOccupation extends Model
{
    use HasFactory, SoftDeletes;

    public function patient()
    {
        return $this->belongsTo('App\Models\Patient');
    }

    public function occupation()
    {
        return $this->belongsTo('App\Models\Occupation');
    }
}
