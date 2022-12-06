<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class VaccinationHistory extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'vaccine',
        'dose',
        'lot_number',
        'application_date'
    ];

    public function medical_history()
    {
        return $this->belongsTo('App\Models\MedicalHistory');
    }

}
