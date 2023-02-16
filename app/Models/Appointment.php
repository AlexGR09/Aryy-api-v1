<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id_physician',
        'user_id_patient',
        'specialty_id',
        'appointment_date',
        'address',
        'status',
    ];

    protected $casts = [
        'appointment_date' => 'date',
        'appointment_time_end' => 'time',
    ];
}
