<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FacilityPhysician extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'facility_physician';

    public function physician()
    {
        return $this->belongsTo(\App\Models\Physician::class);
    }

    public function facility()
    {
        return $this->belongsTo(\App\Models\Facility::class);
    }
}
