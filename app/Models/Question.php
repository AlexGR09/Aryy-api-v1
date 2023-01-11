<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Question extends Model
{
    use HasFactory, SoftDeletes;

    // MUCHAS PREGUNTAS PERTENECEN A UN CUESTIONARIO
    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    // UNA PREGUNTA TIENE MUCHAS RESPUESTAS
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
