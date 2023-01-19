<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalHistoryVaccination extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vaccination_history_id',
        'patient_id',
    ];

    public function medical_history()
    {
        return $this->hasMany('App\Models\MedicalHistory');
    }
    public function vaccination_history(){
        return $this->hasMany('App\Models\VaccinationHistory','id','vaccination_history_id');
    }

}
