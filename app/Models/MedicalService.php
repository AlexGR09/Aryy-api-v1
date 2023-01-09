<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MedicalService extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

    protected $hidden = [
        'created_at', 
        'updated_at',
        'deleted_at'
    ];

    // RELACIÓN MUCHOS A MUCHOS CON EL MODELO ESPECIALIDADES
    public function physicians()
    {
        return $this->belongsToMany(\App\Models\Physician::class, 'medical_service_physician');
    }

}
