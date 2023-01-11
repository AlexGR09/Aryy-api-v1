<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PersonalizedQuestionnaire extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'physician_id',
        'title',
    ];

    protected $hidden = [ 
        'created_at',
        'updated_at',
        'deleted_at',
    ];

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
