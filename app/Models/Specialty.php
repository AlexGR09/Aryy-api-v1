<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialty extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name'
    ];

    // public function physicians()
    // {
    //     return $this->hasMany('App\Models\SpecialtiesPhysician');
    // }

    public function physicians()
    {
        return $this->belongsToMany('App\Models\Physician');
    }
}
