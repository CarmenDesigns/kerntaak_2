@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        {{--The link- back to the files overview.--}}
                        <a href="{{ url('files/index') }}">Files</a>
                    </div>

                    <div class="card-body">

    {{--This form is used to update the chosen file.--}}
    <form method="POST" action="{{route('file.update', ['id'=> $file->id])}}">

        {{ csrf_field() }}
        {{ method_field('PUT') }}
        <div class="edit">

            <div class="form-group row">
                <label for="overview" class="col-sm-4 col-form-label">{{ __('Subject') }}</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="subject" id="subject" value="{{$file->subject}}"><br>
                    </div>
            </div>

            <div class="form-group row">
                <label for="overview" class="col-sm-4 col-form-label">{{ __('Year') }}</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="year" id="year" value="{{$file->year}}"><br>
                    </div>
            </div>


            <div class="form-group row">
                <label for="overview" class="col-sm-4 col-form-label">{{ __('Level') }}</label>
                    <div class="col-md-8">
                        <input class="form-control" type="text" name="level" id="level"  value="{{$file->level}}"><br><br>
                    </div>
            </div>
            <input type="submit" class="btn btn-primary" value="Update">
        </div>
    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>



@endsection