<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    public $table = 'question_choices';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = ['choice', 'is_correct', 'question_id'];

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id');
    }
}
