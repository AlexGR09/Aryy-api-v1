<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class PerinatalBackground extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'last_menstrual_cycle',
        'cycle_time',
        'contraceptive_method_use',
        'assisted_conception',
        'final_ppf',
    ];

    public function medical_history() {
        return $this->hasOne(MedicalHistory::class);
    }
}
