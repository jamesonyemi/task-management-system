@extends('layouts.default')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show task</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tasks.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>First Name:</strong>
                {{ $task->first_name}}
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Last Name:</strong>
            {{ $task->last_name}}
        </div>
      </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong>
                {{ $task->email}}
            </div>
        </div>
    </div>
@endsection