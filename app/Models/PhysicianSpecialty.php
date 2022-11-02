<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhysicianSpecialty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'specialty_id',
        'physician_id',
        'license',
        'institution'
    ];

    public function physician()
    {
        return $this->belongsTo('App\Models\Physician');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Models\Specialty');
    }
}
