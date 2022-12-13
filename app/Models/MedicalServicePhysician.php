<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalServicePhysician extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'medical_service_physician';

    // RELACIONES DE ESTA TABLA PIVOT (M:N)
    public function physicians()
    {
        return $this->belongsToMany('App\Models\Physician')->withPivot('physician_id');
    }

    public function specialties()
    {
        return $this->belongsToMany('App\Models\Specialty')->withPivot('medical_service_id');
    }
}
