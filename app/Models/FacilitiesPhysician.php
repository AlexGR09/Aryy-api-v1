<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacilitiesPhysician extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function physician()
    {
        return $this->belongsTo('App\Models\Physician');
    }

    public function facility()
    {
        return $this->belongsTo('App\Models\Facility');
    }
}
