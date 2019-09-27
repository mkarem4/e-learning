<?php

namespace App\Http\Controllers\Admincp;

use App\Http\Controllers\Controller;
use App\Models\Level;
use App\User;
use Illuminate\Http\Request;


class InstructorController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructors = User::where('type', 2)->get();
        $active = 'instructors';
        return view('admin.instructors.index', compact('instructors', 'active'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        $active = 'instructors';
        return view('admin.instructors.create', compact('active', 'levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'level_id' => 'required',
        ]);

        $user = new User;
        $user->name = request('name');
        $user->email = request('email');
        $user->password = bcrypt(request('password'));
        $user->type = 2;
        $user->level_id = request('level_id');
        $user->save();

        return redirect('/admincp/instructors')->with('success', 'Instructor added successfully .');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instructor = User::findOrFail($id);
        $instructor->delete();
        return redirect('/admincp/instructors')->with('message', 'Deleted Success');
    }
}
