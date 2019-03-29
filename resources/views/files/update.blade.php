@extends('layouts.app')

@section('content')



    {{--This form is used to update the chosen file.--}}
    <form method="POST" action="{{route('file.update', ['id'=> $file->id])}}">

        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="edit">

            {{--The link- back to the files overview.--}}
            <a href="{{ url('files/index') }}">Overview</a><br>
            <h1>File update</h1>

            <input type="text" name="subject" id="subject" value="{{$file->subject}}"><br><br>
            <input type="text" name="year" id="year" value="{{$file->year}}"><br><br>
            <input type="text" name="level" id="level" value="{{$file->level}}"><br><br>
            <input type="submit" class="update" value="Update">

        </div>

    </form>



@endsection