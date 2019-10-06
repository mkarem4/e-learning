<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use App\Models\QuestionChoice;
use Illuminate\Http\Request;
use App\Models\StudentAnswer;

class CourseController extends Controller
{
    public function index()
    {
        if (auth()->user() && auth()->user()->type == 2)
            $courses = Course::where('user_id', auth()->user()->id)->get();
        elseif (auth()->user() && auth()->user()->type == 3)
            $courses = Course::where('level_id', auth()->user()->level_id)->get();
        else
            $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::find($id);
        $exam = Exam::where('course_id', $course->id)->first();
        if ($exam) {
            foreach ($exam->questions as $question)
                $answers = StudentAnswer::where('user_id', auth()->id())->where('question_id', $question->id)->exists();
        } else
            $answers = false;
        return view('courses.show', compact('course', 'exam', 'answers'));
    }

    public function getExamResult($id)
    {
        $user_id = auth()->id();
        $exam = Exam::find($id);
        $questions = Question::where('exam_id', $id)->pluck('id');
        $result = StudentAnswer::getAnswer($user_id, $id);
        $percentage = ($result->score / $exam->degree) * 100;
        $degree = percnetage($percentage);

        // wrong answers
        $stdAnswers = StudentAnswer::whereIn('question_id', $questions)->pluck('choice_id');
        $choices = QuestionChoice::whereIn('id', $stdAnswers)->where('is_correct', 0)->with('question')->orderBy('question_id', 'ASC')->get();
        $answeredQuestions = [];
        foreach ($choices as $choice) {
            $answeredQuestions[] = $choice->question;
        }
        return view('exams.result', compact('percentage', 'exam', 'degree','answeredQuestions'));

    }
}
