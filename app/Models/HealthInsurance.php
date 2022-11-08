<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HealthInsurance extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'insurance_number'
    ];

    // RELACIÓN MUCHOS A UNO CON PACIENTE
    public function patient()
    {
        return $this->hasMany('App\Models\Patient');
    }

    public function insurance()
    {
        return $this->belongsTo('App\Models\Insurance');
    }
}
