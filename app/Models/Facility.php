<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Facility extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'phone',
        'extension',
        'schedule',
        'zicode',
        'street',
        'exterior_no',
        'interior_no',
        'references',
        'public_target',
        'services',
        'city_id',
        'user_id'
    ];

    public function physicians()
    {
        return $this->belongsToMany('App\Models\Physician', 'facility_physician');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }
}
