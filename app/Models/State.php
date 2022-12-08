<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'country_id',
    ];

    public function country()
    {
        return $this->belongsTo(\App\Models\Country::class);
    }

    public function cities()
    {
        return $this->hasMany(\App\Models\City::class);
    }
}
