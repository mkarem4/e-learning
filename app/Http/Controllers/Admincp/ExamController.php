<?php

namespace App\Http\Controllers\Admincp;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Questions;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        $active = 'exams';
        $course =Course::all();
        return view('admin.exams.index',compact('exams','active','course'));
    }
    public function create()
    {
        $courses=Course::all();
        $active = 'exams';
        return view('admin.exams.create', compact('active','courses'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'degree' =>'required',
            'course_id' =>'required',
            'question1' =>'required',
            'question2' =>'required',
            'question3' =>'required',
        ]);

        $exam = new Exam;
        $exam->name = request('name');
        $exam->degree = request('degree');
        $exam->course_id = request('course_id');
        $exam->save();
        $question = new Questions;
        $question->question1 = request('question1');
        $question->question2 = request('question2');
        $question->question3 = request('question3');
        $question->question1_answer = request('question1_answer');
        $question->question2_answer = request('question2_answer');
        $question->question3_answer = request('question3_answer');
        $question->exam_id = 0;
        $question->save();

        return redirect('/admincp/exams')->with('success', 'Exam added successfully .');
    }

    public function show($id)
    {
        $exam = Exam::findOrFail($id);
        return view('admin.exams.show')->with('exam', $exam);
    }

    public function edit($id)
    {
        $active = 'exams';
        $exam = Exam::findOrFail($id);
        $courses = Course::all();
        $question = Questions::all();
        // dd($question);
        return view('admin.exams.edit', compact('exam', 'active', 'courses','question'));
    }


    public function update(Request $request, $id)
    {
        $exam = Exam::find($id)->update($request->all());
        return redirect('/admincp/exams')->with('success', 'Exam updated successfully');
    }


    public function destroy($id)
    {

        $exam = Exam::findOrFail($id);
        $exam->delete();
        return redirect('/admincp/exams')->with('success', 'Exam deleted successfully');
    }
}
