<?php

namespace App\Http\Controllers\Admincp;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Question;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    public function index()
    {
        $exams = Exam::all();
        $active = 'exams';
        return view('admin.exams.index', compact('exams', 'active'));
    }

    public function create()
    {
        $courses = Course::where('user_id', auth()->id())->get();
        $active = 'exams';
        return view('admin.exams.create', compact('active', 'courses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'degree' => 'required|integer',
            'course_id' => 'required',
        ]);

        $data = $request->all();
        Exam::create($data);

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
        $courses = Course::where('user_id', auth()->id())->get();

        return view('admin.exams.edit', compact('exam', 'active', 'courses'));
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
