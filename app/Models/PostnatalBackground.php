<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostnatalBackground extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'delivery_details',
        'baby_name',
        'baby_weight',
        'baby_health',
        'type_of_feeding',
        'emotonial_state',
    ];

    protected $casts = [
        'type_of_feeding' => 'array',
    ];

    public function medical_history()
    {
        return $this->hasOne(MedicalHistory::class);
    }
}
