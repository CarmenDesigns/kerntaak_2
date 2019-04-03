@extends('layouts.app')

@section('content')




    <h3>Files overview</h3>
    <a href="/home" class="btn btn-primary btn-lg active" role="button" aria-pressed="true">Upload new file</a>


    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Filename</th>
            <th scope="col">Subject</th>
            <th scope="col">Year</th>
            <th scope="col">Level</th>
            <th>Edit file</th>
            <th>Delete file</th>
        </tr>
        </thead>

        <tbody>

        {{--A foreach loop is needed to display data in an array. --}}
        @foreach($files as $file)

            <tr>
                <th scope="row">{{$file->id}}</th>

                <th>{{$file->file_id}}</th>
                <th>{{$file->subject}}</th>
                <th>{{$file->year}}</th>
                <th>{{$file->level}}</th>

                {{--The link to the update form--}}
                <th><a href="{{ route("file.edit", ['id'=>$file->id]) }}">
                        <button type="button" class="btn btn-primary">Edit file</button></a></th>
                <th>

                    {{--This form is used for the delete function.--}}
                    <form method="POST" action="{{ route('files.destroy', $file->id) }}">
                        @csrf
                        <input name="_method" type="hidden" value="DELETE">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Delete
                        </button>

                        {{--This is a modal bootstrap window which shows an alert message in the
                            index.blade.php view, when a user clicks the "delete" button--}}
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Delete file</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure you want to delete this file?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </th>
            </tr>

        @endforeach

        {{--The session flash message is used to display a message when a file is updated--}}
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif

        </tbody>
        </table>

    <script>
        $('#myModal').on('shown.bs.modal', function () {
            $('#myInput').trigger('focus')
        })
    </script>

        @endsection