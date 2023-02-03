<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VitalSign extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'temperature',
        'weight',
        'breathing_frecuncy',
        'systolic_pressure',
        'diasystolic_pressure',
        'heart_rate',
        'oxygen_saturation',
        'body_mass',
        'body_fat',
        'weight_loss',
        'fat',
        'waist',
        'water',
        'muscle',
        'abdomen',
    ];

    public function prescription()
    {
        return $this->hasOne(Prescription::class);
    }
}
