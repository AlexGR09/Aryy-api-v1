<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fovorite extends Model
{
    use HasFactory,SoftDeletes;
    protected $fillable = [
        'patient_id',
        'physician_id',
    ];
    public function patient()
    {
        return $this->hasMany(\App\Models\Patient::class);
    }
    public function physician()
    {
        return $this->hasMany(\App\Models\Physician::class);
    }
}
