@extends('layouts.master')

@section('content')

    <div class="panel panel-default">
        <div class="panel-body">

            @if ($errors->any())
                <ul class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            {!! Form::model($project, ['method' => 'PATCH','route' => ['projects.project.update', $project->id], 'enctype'=>"multipart/form-data"])  !!}
                @include('projects.form')
            {!! Form::close() !!}

        </div>
    </div>
    <div id="question" style="display:none; cursor: default;"> 
        {{-- {!! Form::model($project, ['method' => 'POST','route' => ['projects.project.update', $project->id]]) !!}
            @include('projects.change_teamlead')
        {!! Form::close() !!} --}}
        
       
    </div> 

@endsection
