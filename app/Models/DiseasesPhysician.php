<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiseasesPhysician extends Model
{
    use HasFactory, SoftDeletes;

    public function physician()
    {
        return $this->belongsTo('App\Models\Physician');
    }

    // RELACIONES DE ESTA TABLA PIVOT (M:N) PRUEBAS
    public function physicians()
    {
        return $this->belongsToMany('App\Models\Physician')->withPivot('physician_id');
    }

    public function disease()
    {
        return $this->belongsTo('App\Models\Disease');
    }
}
