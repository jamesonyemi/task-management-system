@extends('layouts.default')

@section('content')

    <div class="panel panel-default">
  
       {{--  <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5">{{ !empty($title) ? $title : 'Project' }}</h4>
            </div>
            <div class="btn-group btn-group-sm pull-right" role="group">

                <a href="{{ route('projects.project.index') }}" class="btn btn-primary" title="Show All Project">
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true">Show</span>
                </a>

                <a href="{{ route('projects.project.create') }}" class="btn btn-success" title="Create New Project">
                    <span class="glyphicon glyphicon-plus" aria-hidden="true">New Project</span>
                </a>

            </div>
        </div> --}}

        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif

           {{--  <form method="POST" action="{{ route('projects.project.update', $project->id) }}" accept-charset="UTF-8" class="form-horizontal">
            {{ csrf_field() }}
            <input name="_method" type="hidden" value="PUT">
            @include ('projects.form', [
                                        'project' => $project,
                                      ])

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Update">
                    </div>
                </div>
            </form> --}}
        
            {!! Form::model($project, ['method' => 'PATCH','route' => ['projects.project.update', $project->id]]) !!}
                @include('projects.form')
            {!! Form::close() !!}

        </div>
    </div>

@endsection