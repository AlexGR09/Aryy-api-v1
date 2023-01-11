<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SurveyOLD extends Model
{
    use HasFactory;
    protected $fillable = [
        'physician_id',
        'title',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'physician_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class);
    }
}
