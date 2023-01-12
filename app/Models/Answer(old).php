<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnswerOLD extends Model
{
    use HasFactory;
    protected $fillable = [
        'answer',
        'question_id',
        'survey_id',
        'physician_id'
    ];

    public function survey()
    {
        return $this->belongsTo(Survey::class);
    }

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'patient_id', 'id');
    }
}
