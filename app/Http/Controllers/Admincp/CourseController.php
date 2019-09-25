<?php

namespace App\Http\Controllers\Admincp;
use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Level;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        $active = 'courses';
        return view('admin.courses.index',compact('courses','active'));
    }
    public function create()
    {
        $levels=Level::all();
        // dd($level);
        $active = 'courses';
        return view('admin.courses.create',compact('active'),compact('levels'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'description' =>'required',
            'cover' =>'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'level_id' =>'required'
        ]);
        $course = new Course;
        $course->name = request('name');
        $course->description = request('description');
        $course->cover = $request->file('cover');
        $course->level_id = request('level_id');
        $course->save();

        return redirect('/admincp/courses')->with('success', 'Course added successfully .');
    }
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.show')->with("course",$course);
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('edit')->with("course",$course);
    }


    // public function update(Request $request, $id)
    // {
    //     $course = Course::find($id)->update($request->all());
    //     return redirect()->route('show', $id)->with("message", "Updated Success");
    // }


    // public function destroy($id)
    // {
    //     $course = Course::findOrFail($id);
    //     $course->delete();
    //     return redirect()->route('index')->with("message", "Delete Success");
    // }
}
