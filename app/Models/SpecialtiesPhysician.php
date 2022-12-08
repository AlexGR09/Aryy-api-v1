<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SpecialtiesPhysician extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'license'=>'unique',
        'institution',
    ];

    public function physician()
    {
        return $this->belongsTo('App\Models\Physician');
    }

    public function specialty()
    {
        return $this->belongsTo('App\Models\Specialty');
    }
}
