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
        $courses = Course::where('user_id', auth()->id())->get();
        $active = 'materials';
        return view('admin.materials.create', compact('active', 'courses'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:3',
            'note' => 'required',
            'chapter' => 'required|min:3',
            'file' => 'sometimes|mimes:pdf,video/mp4|max:10000',
//            'youtube_link' => 'sometimes|regex:/^(http(s)?:\/\/)?((w){3}.)?youtu(be|.be)?(\.com)?\/.+$/',
            'course_id' => 'required'
        ]);

        $type = 0;
        if ($request->youtube_link)
            $type = 3;
        else {
            $ext = request()->file->getClientOriginalExtension();
            $ext == 'pdf' ? $type = 2 : $type = 1;
            $media = time() . '.' . request()->file->getClientOriginalExtension();
            request()->file->move(public_path('uploads/materials'), $media);
        }
        $material = new Material;
        $material->name = request('name');
        $material->note = request('note');
        $material->chapter = request('chapter');
        if ($request->file)
            $material->file = $media;
        else
            $material->file = request('youtube_link');
        $material->type = $type;
        $material->course_id = request('course_id');

        $material->save();

        return redirect('/admincp/materials')->with('success', 'Material added successfully .');
    }

    public function show($id)
    {
        $material = Material::findOrFail($id);
        return view('admin.materials.show', compact('material'));
    }

    public function edit($id)
    {
        $active = 'materials';
        $material = Material::findOrFail($id);
        return view('admin.materials.edit', compact('material', 'active'));
    }


    public function update(Request $request, $id)
    {
        $course = Course::find($id)->update($request->all());
        return redirect('/admincp/materials')->with('success', 'Course updated successfully');
    }


    public function destroy($id)
    {
        $material = Material::findOrFail($id);
        $path = public_path() . '/uploads/materials/' . $material->file;
        if (file_exists($path)) {
            unlink($path);
        }
        $material->delete();
        return redirect('/admincp/materials')->with('success', 'Material deleted successfully');
    }
}
