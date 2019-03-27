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
    <form method="get" action = "{{route('files/index', $file->id)}}">
        @csrf

        @foreach($files as $file)

    <tr>
        <th scope="row">1</th>
        <td>{{$file->upload->filename}}</td>
        <td>{{$file->subject}}</td>
        <td>{{$file->year}}</td>
        <td>{{$file->level}}</td>
    </tr>
    <tr>
        <th scope="row">2</th>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <th scope="row">3</th>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </form>
    @endforeach
    </tbody>
</table>


@endsection