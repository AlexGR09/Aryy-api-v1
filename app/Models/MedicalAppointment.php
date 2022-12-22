<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalAppointment extends Model
{
    use HasFactory, SoftDeletes;

    // protected $fillable = [

    // ];

    // RELACIÓN MUCHOS A UNO CON LA TABLA PHYSICIANS
    public function physician()
    {
        return $this->belongsTo(Physician::class);
    }

    // RELACIÓN MUCHOS A UNO CON LA TABLA PATIENTS
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
}
