<?php

namespace App\Http\Controllers\Admincp;
use App\Http\Controllers\Controller;
use App\Models\Course;
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
        $active = 'courses';
        return view('admin.courses.new',compact('active'));
    }
    public function store(Request $request)
    {
        dd(User::all());
        $this->validate($request, [
        'cover' => 'required|cover|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $auth_user = ["user_id"=>Auth::id()];
        $course = new Course($request->all()+$auth_user) ;

         if($file = $request->hasFile('cover')) {
            $file = $request->file('cover') ;
            $fileName = $file->getClientOriginalName() ;
            $destinationPath = public_path().'/covers/' ;
            $file->move($destinationPath,$fileName);
            $course->cover = 'covers/'. $fileName ;
        }
        $course->save() ;
        return redirect()->route('courses.index');
    }
    public function show($id)
    {
        $course = Course::findOrFail($id);
        return view('show')->with("course",$course);
    }

    // public function edit($id)
    // {
    //     $course = Course::findOrFail($id);
    //     return view('edit')->with("course",$course);
    // }


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
