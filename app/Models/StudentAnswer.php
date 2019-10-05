<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class StudentAnswer extends Model
{
    public $table = 'student_answer';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    public $fillable = ['choice_id', 'user_id', 'question_id'];

    public static function getAnswer($user_id,$exam_id){

        $results = DB::select( DB::raw("SELECT SUM(answers.degree) score FROM 
        (SELECT qa.q_id q_id, qa.c_id c_id, qa.degree degree, sa.choice_id, 
        (CASE WHEN qa.c_id = sa.choice_id THEN 1 ELSE 0 END) is_correct 
        FROM student_answer sa JOIN (SELECT q.id q_id, q.degree degree, c.id c_id 
        FROM questions q JOIN question_choices c ON q.id = c.question_id 
        WHERE q.exam_id = :exam_id and c.is_correct = 1) qa ON sa.question_id = qa.q_id 
        WHERE user_id = :user_id) answers WHERE is_correct = 1"), array(
            'user_id' => $user_id,
            'exam_id' => $exam_id
          ));
          return $results[0];


}
}
