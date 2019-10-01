<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use App\Models\StudentAnswer;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function show($id)
    {
        $exam = Exam::find($id);
        return view('exams.show', compact('exam'));
    }


    public function saveResult(Request $request)
    {
        $data = $request->except('_token');
        $iMax = count($data)/2;
        $answers = [];
        for ($i = 1; $i <= $iMax; $i++) {
            $question = 'question' . $i;
            $answer = 'answer' . $i;
            array_push($answers, array($request->$question, $request->$answer));
        }

        foreach ($answers as $answer) {
            $student_answer = new StudentAnswer;
            $student_answer->question_id = $answer[0];
            $student_answer->choice_id = $answer[1];
            $student_answer->user_id = auth()->id();

            $student_answer->save();
        }

        return redirect('/courses')->with('success', 'Exam resolved');

    }
}
