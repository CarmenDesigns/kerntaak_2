<?php

namespace kerntaak_2\Http\Controllers;

use Illuminate\Http\Request;
use kerntaak_2\File;
use kerntaak_2\Upload;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    //The index function displays a list of all files and uploads in files/index.

    public function index()
    {

        $files = File::all();
        $uploads = Upload::all();

        return view('files.index', compact('files', 'uploads'));
    }

    //The store function stores the file and its information in the database and validates it.

    public function store(Request $request)
    {
        $path = $request->filename->store('public');


        $request->validate([
            'subject' => 'required',
            'year' => 'required|numeric',
            'level' => 'required',


        ]);

        //A file can be uploaded by an authenticated user.

        $file = auth()->user()->files()->create([
            'subject' => $request->get('subject'),
            'year' => $request->get('year'),
            'level' => $request->get('level'),


        ]);

        //The object Upload is defined, given a path, associated with the user and finally saved in the database.

        $upload = new Upload();
        $upload->filename = $path;
        $upload->file_id = $file->id;
        $upload->user()->associate(auth()->user());
        $upload->save();

        return back()->with('message', 'Your file is submitted successfully');
    }



    //Display the specified file
    public function show()
    {

        $files = File::all();
        return view('files.update',compact('files'));
    }

    //Show the form to update the file.
    public function edit($id)
    {

        $files = File::find($id);
        return view("files.update", ['file' => $files]);
    }

    //Update the specified file

    public function update(Request $request,$id)
    {

        $files = File::find($id);
        $files->update($request->all());
        return redirect()->route('files.index')->with('success', 'Update successful');
    }

    // Delete the specified file.
    public function destroy($id){

        File::find($id)->delete();
        return redirect()->route('files.index')->with('message', 'File has been deleted');
    }
}


