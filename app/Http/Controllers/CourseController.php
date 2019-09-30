<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
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
        foreach ($exam->questions as $question)
            $answers = StudentAnswer::where('user_id', auth()->id())->where('question_id', $question->id)->exists();
        return view('courses.show', compact('course', 'exam', 'answers'));
    }

    public function getExamResult($id)
    {
        $exam = Exam::find($id);
        $questions = Question::where('exam_id',$id)->with('choices')->get();
        dd($questions);
        $studentAnswers = StudentAnswer::where('user_id', auth()->id())->get();
    }
}
