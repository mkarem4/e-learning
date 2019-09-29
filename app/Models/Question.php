<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $table = 'questions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = ['question', 'degree', 'exam_id'];

    public function exam()
    {
        return $this->belongsTo(Exam::class, 'exam_id');
    }


    public function choices()
    {
        return $this->hasMany(QuestionChoice::class,'question_id');
    }
}
