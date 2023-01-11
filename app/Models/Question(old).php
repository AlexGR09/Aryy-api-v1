<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionOLD extends Model
{
    use HasFactory;
    protected $fillable = [
        'survey_id',
        'physician_id',
        'title',
    ];
    protected $with = ['answers'];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
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
