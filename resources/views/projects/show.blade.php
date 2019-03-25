@extends('layouts.master')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix card">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Project :' . "\n" .$project->project_name }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('projects.project.destroy', $project->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm offset-md-9 col" role="group">
                    <a href="{{ route('projects.project.index') }}" class="btn btn-primary" title="Show All Project">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true">Show</span>
                    </a>

                    <a href="{{ route('projects.project.create') }}" class="btn btn-success" title="Create New Project">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true">Create</span>
                    </a>
                    
                    <a href="{{ route('projects.project.edit', $project->id ) }}" class="btn btn-primary" title="Edit Project">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true">Edit</span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Project" onclick="return confirm(&quot;Delete Project??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true">Delete</span>
                    </button>
                </div>
            </form>

        </div>

    </div>
<div class="row">
    <div class="panel-body card card-header">
        <br>
        <dl class="dl-horizontal">
           <div class="col col-md-5">
            <dt>Project Name</dt>
            <dd>{{ $project->project_name }}</dd>
         </div>

        <div class="col col-md-5">
            <dt>Description</dt>
            <dd>{{ $project->description }}</dd>
        </div>

         <div class="col col-md-5">
            <dt>Status</dt>
            <dd>{{ $project->status }}</dd>
        </div>  
         {{-- <div class="col col-md-5">
            <dt>Assigned By</dt>
            <dd>{{  isset($project->assignedBy->id) ? $project->assignedBy->user_id : ''  }}</dd>
         </div> --}}

        <div class="col col-md-5">
            <dt>Assignee</dt>
            <dd>{{ $project->assignee }}</dd>
        </div>
            <dt>Priority</dt>
            <dd>{{ $project->priority }}</dd>
            <dt>Watchers</dt>
            <dd>{{ $project->watchers }}</dd>

        </dl>

    </div>
</div>
</div>

@endsection