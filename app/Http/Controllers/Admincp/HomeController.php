<?php

namespace App\Http\Controllers\Admincp;

use App\Http\Controllers\Controller;

use App\Models\Course;
use App\Models\Material;
use App\User;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use App\services\SharingService;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $active = 'dashboard';
        $instructors = User::where('type', 2)->count();
        $students = User::where('type', 3)->count();
        $courses = Course::count();
        $materials = Material::count();
        return view('admin.home.dashboard', compact('active'), compact('instructors', 'students', 'courses', 'materials'));
    }


}
