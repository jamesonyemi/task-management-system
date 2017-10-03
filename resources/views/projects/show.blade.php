@extends('layouts.default')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading clearfix">

        <span class="pull-left">
            <h4 class="mt-5 mb-5">{{ isset($title) ? $title : 'Project' }}</h4>
        </span>

        <div class="pull-right">

            <form method="POST" action="{!! route('projects.project.destroy', $project->id) !!}" accept-charset="UTF-8">
            <input name="_method" value="DELETE" type="hidden">
            {{ csrf_field() }}
                <div class="btn-group btn-group-sm" role="group">
                    <a href="{{ route('projects.project.index') }}" class="btn btn-primary" title="Show All Project">
                        <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                    </a>

                    <a href="{{ route('projects.project.create') }}" class="btn btn-success" title="Create New Project">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                    </a>
                    
                    <a href="{{ route('projects.project.edit', $project->id ) }}" class="btn btn-primary" title="Edit Project">
                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </a>

                    <button type="submit" class="btn btn-danger" title="Delete Project" onclick="return confirm(&quot;Delete Project??&quot;)">
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </div>
            </form>

        </div>

    </div>

    <div class="panel-body">
        <dl class="dl-horizontal">
            <dt>Project Name</dt>
            <dd>{{ $project->project_name }}</dd>
            <dt>Description</dt>
            <dd>{{ $project->description }}</dd>
            <dt>Status</dt>
            <dd>{{ $project->status }}</dd>
            <dt>Assigned By</dt>
            <dd>{{  isset($project->assignedBy->id) ? $project->assignedBy->id : ''  }}</dd>
            <dt>Assignee</dt>
            <dd>{{ $project->assignee }}</dd>
            <dt>Priority</dt>
            <dd>{{ $project->priority }}</dd>
            <dt>Watchers</dt>
            <dd>{{ $project->watchers }}</dd>

        </dl>

    </div>
</div>

@endsection