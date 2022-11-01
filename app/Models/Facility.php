<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'facility_name',
        'address',
        'phone_number',
        'clues',
        'zip_code',
        'schedule',
        'consultation_length',
        'accessibility',

    ];

    public function physicians()
    {
        return $this->hasMany('App\Models\FacilitiesPhysician');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
