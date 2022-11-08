<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhysicianSpecialty extends Model
{
    protected $table = 'physician_specialty';

    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'specialty_id',
        'physician_id',
        'license',
        'institution'
    ];

    // protected $hidden = [
    //     'id',
    //     'physician_id',
    //     'created_at',
    //     'updated_at',
    //     'deleted_at',
    // ];

    // MÉTODOS PARA AGREGAR MÁS CAMPOS ENTRE TABLAS CON UNA TABLA PIVOTW (M:N)
    // public function physicians()
    // {
    //     return $this->belongsToMany('App\Models\Physician');
    // }

    // public function specialties()
    // {
    //     return $this->belongsToMany('App\Models\Specialty')->withPivot('specialty_id');
    // }
    
}