<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->user()->type == 2)
            $courses = Course::where('user_id', auth()->user()->id)->get();
        elseif (auth()->user()->type == 3)
            $courses = Course::where('level_id', auth()->user()->level)->get();
        else
            $courses = Course::all();
        return view('home', compact('courses'));
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

}
