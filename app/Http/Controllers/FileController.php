<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
use App\Upload;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function index()
    {

        $files = File::all();
        $uploads = Upload::all();

        return view('files.index', compact('files', 'uploads'));
    }

    public function store(Request $request)
    {
        $path = $request->filename->store('public');


        $request->validate([
            'subject' => 'required',
            'year' => 'required|numeric',
            'level' => 'required'
        ]);


        $file = auth()->user()->files()->create([
            'subject' => $request->get('subject'),
            'year' => $request->get('year'),
            'level' => $request->get('level'),
            'filename'=>$request->get('filename')
        ]);

        $upload = new Upload();
        $upload->filename = $path;
        $upload->file_id = $file->id;
        $upload->user()->associate(auth()->user());
        $upload->save();

        return back()->with('message', 'Your file is submitted successfully');
    }

    public function show()
    {

        $files = File::all();
        return view('files.update',compact('files'));
    }

    public function edit($id)
    {

        $files = File::find($id);
        return view("files.update", ['file' => $files]);

    }

    public function update(Request $request,$id)
    {

        $files = File::find($id);
        $files->update($request->all());
        return redirect()->route('files.index')->with('message', 'Update successful');
    }


    public function destroy($id){

        File::find($id)->delete();
        return redirect()->route('files.index')->with('message', 'File has been deleted');
    }
}


