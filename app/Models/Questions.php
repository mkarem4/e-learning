<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    public $table = 'questions';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = ['question1','question1_answer','question2','question2_answer','question3','question3_answer'];
    public function exams()
    {
        return $this->belongsTo(Exam::class);
    }

   
}
