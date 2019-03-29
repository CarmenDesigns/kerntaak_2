@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">File Upload</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('file.upload') }}" aria-label="{{ __('Upload') }}" enctype="multipart/form-data">

                            @csrf
                            <label for="exampleFormControlFile1">Upload your file</label>
                            <input type="file"  name="filename" class="form-control-file" id="exampleFormControlFile1">


                            <div class="form-group row">
                                <label for="overview" class="col-sm-4 col-form-label">{{ __('Subject') }}</label>
                                <div class="col-md-8">
                                    <input id="subject" cols="10" rows="10" class="form-control{{ $errors->has('subject') ? ' is-invalid' : '' }}" name="subject" value="{{ old('subject') }}" required autofocus>
                                    @if ($errors->has('subject'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('subject') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="year" class="col-sm-4 col-form-label">{{ __('Year') }}</label>
                                <div class="col-md-8">
                                    <input id="year" type="text" class="form-control{{ $errors->has('year') ? ' is-invalid' : '' }}" name="year" value="{{ old('year') }}" required autofocus />
                                    @if ($errors->has('year'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('year') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="level" class="col-sm-4 col-form-label">{{ __('Level') }}</label>
                                <div class="col-md-8">
                                    <input id="level" type="text" class="form-control{{ $errors->has('level') ? ' is-invalid' : '' }}" name="level" value="{{ old('level') }}" required autofocus />
                                    @if ($errors->has('level'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('level') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-4 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Upload') }}
                                    </button>
                                </div>
                            </div>
                            @if(session()->get('message'))
                                <div class="alert alert-success">
                                    {{ session()->get('message') }}
                                </div>
                            @endif
                        </form>

                    </div>
                    <div class="card-body">
                        You are logged in!
                        <a href="files/index">Overview</a>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
