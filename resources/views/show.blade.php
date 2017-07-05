@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{$task->name}}
                    <div class="pull-right"><a class="btn btn-default" href="/">Back</a> | 

                        {{-- make this a partial --}}
                        <form style="display: initial;" action="{{ url('task/'.$task->id) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">
                                <i class="fa fa-btn fa-trash"></i>Delete
                            </button>
                        </form>
                    </div>

                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    Created on the {{ $task->created_at}}
                    <hr>
                    <h2>Task Description</h2>
                    <p>{{$task->description}}</p>
                    <hr>

                     @if (count($task->notes))
                        <h3>Notes</h3>
                        <hr>
                        @foreach ($task->notes as $note)
                            <p><strong>Created on : </strong>{{ $note->created_at }}</p>
                            <p>{{ $note->description }} </p>
                            <hr>
                        @endforeach
                    @endif

                    <!-- New Note Form -->
                    <form action="{{ url('notes/'.$task->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Task Name -->
                        <div class="form-group">
                            <div class="col-sm-6">
                                <label for="task-des" class="col-sm-3 control-label">Notes</label>
                                <textarea type="text" name="description" id="task-des" class="form-control" rows="5" ></textarea>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Note
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>


        </div>
    </div>
@endsection
