<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialitiesPhysician extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function physician()
    {
        return $this->belongsTo('App\Models\Physician');
    }

    public function speciality()
    {
        return $this->belongsTo('App\Models\Speciality');
    }
}
