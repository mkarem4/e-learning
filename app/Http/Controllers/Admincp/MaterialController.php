<?php

namespace App\Http\Controllers\Admincp;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Level;
use App\Models\Material;
use Illuminate\Http\Request;

class MaterialController extends Controller
{
    public function index()
    {
        $courses = Course::where('user_id', auth()->id())->pluck('id');
        $materials = Material::whereIn('course_id', $courses)->get();
        $active = 'materials';
        return view('admin.materials.index', compact('materials', 'active'));
    }

    public function create()
    {
        $courses = Course::where('user_id',auth()->id())->get();
        $active = 'courses';
        return view('admin.courses.create', compact('active', 'courses'));
    }

    public function store(Request $request)
    {

        // file type
        //  1 -> video   2-> pdf file  3-> youtube link
        //  if $request->youtube    then save type 3 else check on file extension ()
        // ext = request()->file->getClientOriginalExtension(); and check on it to save type 1 or 2

        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        $imageName = time() . '.' . request()->file->getClientOriginalExtension();
        request()->file->move(public_path('uploads/courses'), $imageName);


        return redirect('/admincp/courses')->with('success', 'Course added successfully .');
    }

    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('admin.courses.show')->with('course', $course);
    }

    public function edit($id)
    {
        $active = 'courses';
        $course = Course::findOrFail($id);
        $levels = Level::all();
        return view('admin.courses.edit', compact('course', 'active', 'levels'));
    }


    public function update(Request $request, $id)
    {
        $course = Course::find($id)->update($request->all());
        return redirect('/admincp/courses')->with('success', 'Course updated successfully');
    }


    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $path = public_path() . '/uploads/courses/' . $course->file;
        if (file_exists($path)) {
            unlink($path);
        }
        $course->delete();
        return redirect('/admincp/courses')->with('success', 'Course deleted successfully');
    }
}
