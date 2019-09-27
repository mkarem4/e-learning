<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Material;

class CourseController extends Controller
{
    public function index()
    {
        if (auth()->user()->type == 2)
            $courses = Course::where('user_id', auth()->user()->id)->get();
        elseif (auth()->user()->type == 3)
            $courses = Course::where('level_id', auth()->user()->level)->get();
        else
            $courses = Course::all();
        return view('courses.index', compact('courses'));
    }

    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show', compact('course'));
    }
}
