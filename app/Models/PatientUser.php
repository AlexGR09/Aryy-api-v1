<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PatientUser extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'patient_user';

    // RELACIONES DE ESTA TABLA PIVOT (M:N)
    public function patients()
    {
        return $this->belongsToMany(\App\Models\Patient::class)->withPivot('patient_id');
    }

    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class)->withPivot('user_id');
    }
}
