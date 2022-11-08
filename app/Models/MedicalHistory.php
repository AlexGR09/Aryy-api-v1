<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'current_medication',
        'previous_medication',
        'family_history',
        'habits'
    ];

    public function patient()
    {
        return $this->hasOne('App\Models\Patient');
    }

    public function alergy()
    {
        return $this->belongsTo('App\Models\Alergy');
    }
}
