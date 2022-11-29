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
        'zipcode',
        'street',
        'exterior_no',
        'interior_no',
        'suburb',
        'references',
        'public_target',
        'accesibility',
        'services',
    ];
    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'schedule' => 'array',
        'services' => 'array',
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
