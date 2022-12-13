<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'physician_id',
        'specialty_id',
        'appointment_date',
        'address',
        'status'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function physician()
    {
        return $this->belongsTo(Physician::class);
        
    }
    public function specialty()
    {
        return $this->belongsTo(Specialty::class);        
    }
}
