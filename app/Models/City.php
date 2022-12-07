<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name', 'state_id',
    ];

    public function state()
    {
        return $this->belongsTo(\App\Models\State::class);
    }

    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
