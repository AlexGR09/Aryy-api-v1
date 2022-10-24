<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'photo'
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function ocupation(){
        return $this->hasMany('App\Models\OcupationPatient');
    }

    public function health_insurance(){
        return $this->belongsTo('App\Models\HealthInsurance');
    }

    public function medical_records(){
        return $this->belongsTo('App\Models\MedicalRecord');
    }

    public function medical_history(){
        return $this->belongsTo('App\Models\MedicalHistory');
    }
}
