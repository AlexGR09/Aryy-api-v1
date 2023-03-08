<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhysicianSpecialty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'physician_specialty';

    protected $fillable = [
        'specialty_id',
        'physician_id',
        'license',
        'lincense_photo',
        'institution',
    ];

    protected $hidden = [
        'id',
        'physician_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    // RELACIONES DE ESTA TABLA PIVOT (M:N)
    public function physicians()
    {
        return $this->belongsToMany(\App\Models\Physician::class)->withPivot('physician_id');
    }

    public function specialties()
    {
        return $this->belongsToMany(\App\Models\Specialty::class)->withPivot('specialty_id');
    }
}
