<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PyschologicalBackground extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'family_history',
        'disease_awareness',
        'areas_affected_by_the_disease',
        'family_support_group',
        'family_group_of_the_patient',
        'aspects_of_social_life',
        'aspects_of_working_life',
        'relationship_whit_authority',
        'inpulse_control',
        'frustration_management',
    ];

    public function medical_history()
    {
        return $this->hasOne(\App\Models\MedicalHistory::class);
    }
}
