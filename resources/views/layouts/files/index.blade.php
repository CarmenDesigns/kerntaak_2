@php
    die('hello');
@endphp

@extends('layouts.app')


@section('content')



<table class="table">
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
        <td>{{$file->upload->filename}}</td>
        <td>{{$file->subject}}</td>
        <td>{{$file->year}}</td>
        <td>{{$file->level}}</td>
        <td> <a href="{{route('file.edit',['id' => $file->id])}}"></a></td>
        <td>

        </td>
    </tr>


    @endforeach
    </tbody>
</table>


@endsection