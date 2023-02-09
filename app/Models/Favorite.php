<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Favorite extends Model
{
    use HasFactory,SoftDeletes;

    protected $fillable = [
        'patient_id',
        'physician_id',
        'is_favorite'
    ];

    public function patient()
    {
        return $this->hasMany(Patient::class);
    }

    public function physician()
    {
        return $this->hasMany('App\Models\Physician', 'id', 'physician_id');
    }
}
