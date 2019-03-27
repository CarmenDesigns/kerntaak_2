<?php

namespace App\Http\Controllers;

use App\Upload;
use Illuminate\Http\Request;

class FileController extends Controller
{
    public function index(){

    }

    public function store(Request $request){


        $path = $request->file('filename')->store('public');

        $request -> validate([
            'subject' => 'required',
            'year' => 'required|numeric',
            'level' => 'required'
        ]);

        auth()->user()->files()->create([
           'subject' => $request ->get('subject'),
           'year' => $request ->get('year'),
           'level'=> $request ->get('level')
        ]);

        $upload = New Upload();
        $upload -> filename = $path;

        $upload->user()->associate(auth()->user());

        $upload->save();

        return back()->with('message', 'File has been successfully submitted');
    }
}
