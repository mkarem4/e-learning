<?php

namespace App\Http\Controllers\Admincp;
use App\Http\Controllers\Controller;
use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::all();
        $active = 'levels';
        return view('admin.levels.index',compact('levels','active'));
    }
    public function create()
    {
        $active = 'levels';
        return view('admin.levels.create',compact('active'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
        ]);

        $level = new Level;
        $level->name = request('name');
        $level->save();

        return redirect('/admincp/levels')->with('success', 'level added successfully .');
    }
    public function show($id)
    {
        $level = Level::findOrFail($id);
        return view('admin.levels.show')->with('level',$level);
    }

    public function edit($id)
    {
        $level = Level::findOrFail($id);
        $active = 'levels';
        return view('admin.levels.edit', compact('active', 'level'));
    }

       public function update(Request $request, $id)
    {
        $level = Level::find($id)->update($request->all());
        return redirect('/admincp/levels')->with('message', 'Updated Success');
    }


    public function destroy($id)
    {
        $level = Level::findOrFail($id);
        $level->delete();
        return redirect('/admincp/levels')->with('message', 'Delete Success');
    }

}
