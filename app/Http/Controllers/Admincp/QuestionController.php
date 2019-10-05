<?php

namespace App\Http\Controllers\Admincp;

use App\Models\Course;
use App\Models\Exam;
use App\Models\QuestionChoice;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Validation\ValidationException;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $courses = Course::where('user_id', auth()->id())->pluck('id');
        $exams = Exam::whereIn('course_id', $courses)->pluck('id');
        $questions = Question::whereIn('exam_id', $exams)->get();
        $active = 'questions';
        return view('admin.questions.index', compact('questions', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $courses = Course::where('user_id', auth()->id())->pluck('id');
        $exams = Exam::whereIn('course_id', $courses)->get();
        $active = 'questions';
        return view('admin.questions.create', compact('exams', 'active'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     * @throws ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'degree' => 'required|integer',
            'question' => 'required|min:5',
            'answer1' => 'required|min:3',
            'answer2' => 'required|min:3',
            'answer3' => 'required|min:3',
            'is_correct' => 'required',
            'exam_id' => 'required'
        ]);
        $is_correct1 = 0;
        $is_correct2 = 0;
        $is_correct3 = 0;

        if ($request->is_correct == 'answer1') {
            $is_correct1 = 1;
        } elseif ($request->is_correct == 'answer2') {
            $is_correct2 = 1;
        } else {
            $is_correct3 = 1;
        }

        $answers = [];
        array_push($answers, array($request->answer1, $is_correct1), array($request->answer2, $is_correct2), array($request->answer3, $is_correct3));

        $question = new Question;
        $question->question = $request->question;
        $question->exam_id = $request->exam_id;
        $question->degree = $request->degree;

        if ($question->save()) {
            $id = $question->id;
            foreach ($answers as $answer) {
                $data = array(
                    'question_id' => $id,
                    'choice' => $answer[0],
                    'is_correct' => $answer[1],
                );
                QuestionChoice::insert($data);
            }

        }

        return redirect('/admincp/questions')->with('success', 'Question added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $courses = Course::where('user_id', auth()->id())->pluck('id');
        $exams = Exam::whereIn('course_id', $courses)->get();
        $question = Question::findOrFail($id);
        $active = 'questions';
        return view('admin.questions.edit', compact('courses','exams', 'active', 'question'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'degree' => 'required|integer',
            'question' => 'required|min:5',
            'answer1' => 'required|min:3',
            'answer2' => 'required|min:3',
            'answer3' => 'required|min:3',
            'is_correct' => 'required',
            'exam_id' => 'required'
        ]);

        if ($request->is_correct == 'answer1') {
            $is_correct1 = 1;
            $is_correct2 = 0;
            $is_correct3 = 0;
        } elseif ($request->is_correct == 'answer2') {
            $is_correct1 = 0;
            $is_correct2 = 1;
            $is_correct3 = 0;
        } else {
            $is_correct1 = 0;
            $is_correct2 = 0;
            $is_correct3 = 1;
        }

        $answers = [];
        array_push($answers, array($request->answer1, $is_correct1), array($request->answer2, $is_correct2), array($request->answer3, $is_correct3));

        $question = Question::findOrFail($id);
        $question->question = $request->question;
        $question->exam_id = $request->exam_id;
        $question->degree = $request->degree;

        if ($question->save()) {
            $id = $question->id;
            foreach ($answers as $answer) {
                $data = array(
                    'question_id' => $id,
                    'choice' => $answer[0],
                    'is_correct' => $answer[1],
                );
                QuestionChoice::destroy($id);
                QuestionChoice::insert($data);
            }

        }

        return redirect('/admincp/questions')->with('success', 'Question updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $question = Question::findOrFail($id);
        $question->delete();
        return redirect('/admincp/questions')->with('message', 'Deleted Success');
    }
}
