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
        'previous_medication',
    ];

    public function medical_history()
    {
        return $this->hasOne(\App\Models\MedicalHistory::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'physical_activity' => 'object',
        'rest_time' => 'object',
        'smoking' => 'object',
        'alcoholim' => 'object',
        'drug_active' => 'object',
        'previous_medication' => 'object',
    ];
}
