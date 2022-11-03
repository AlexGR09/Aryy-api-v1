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

    // MÉTODOS PARA AGREGAR MÁS CAMPOS ENTRE TABLAS CON UNA TABLA PIVOTW (M:N)
    public function physician()
    {
        return $this->belongsToMany('App\Models\Physician')->withPivot('license', 'institution');
    }

    public function specialty()
    {
        return $this->belongsToMany('App\Models\Specialty')->withPivot('license', 'institution');
    }
}
