@extends('layouts.app')

@section('content')

    <style>

    </style>
    <h1>Files overview</h1>
    <a href="/home">Upload new file</a>


    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Filename</th>
            <th scope="col">Subject</th>
            <th scope="col">Year</th>
            <th scope="col">Level</th>

        </tr>
        </thead>
        <tbody>

        @foreach($files as $file)


            <tr>
                <th scope="row">{{$file->id}}</th>

                <th>{{$file->upload->filename}} </th>
                <th>{{$file->subject}}</th>
                <th>{{$file->year}}</th>
                <th>{{$file->level}}</th>
                <th><a href="{{ route("file.edit", ['id'=>$file->id]) }}">Edit</a></th>
                <th>
                    <form method="POST" action="{{ route('files.destroy', ['id' => $file->id]) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="submit">Delete</button>
                    </form>
                </th>
            </tr>
            @if(session()->get('message'))
                <div class="alert alert-success">
                    {{ session()->get('message') }}
                </div>
            @endif
        @endforeach

        </tbody>
        </table>


        @endsection