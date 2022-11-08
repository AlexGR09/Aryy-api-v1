<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name'
    ];

    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO ESPECIALIDADES
    public function physicians()
    {
        return $this->belongsToMany('App\Models\Physician');
    }

    // public function physicians()
    // {
    //     return $this->hasMany('App\Models\SpecialtiesPhysician');
    // }
}
