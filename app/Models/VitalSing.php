<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VitalSing extends Model
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
        'weightloos',
        'fat',
        'waist',
        'water',
        'muscle',
        'abdomen',
    ];
}
