<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Survey extends Model
{
    use HasFactory, SoftDeletes;

    // MUCHOS CUESTIONARIOS PERTENECEN A UN MÉDICO
    public function physician()
    {
        return $this->belongsTo(Physician::class);
    }

    // UN CUESTIONARIO TIENE MUCHAS PREGUNTAS
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
