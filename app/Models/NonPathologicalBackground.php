<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class NonPathologicalBackground extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'physical_activity',
        'rest_time',
        'smoking',
        'alcoholim',
        'other_substances',
        'diet',
        'drug_active',
        'previous_medication'
    ];
}
