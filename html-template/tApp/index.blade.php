@extends('layouts.default')
@section('content')
<div>
<div class="content-wrapper">
<!-- Responsive tables start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">
                <div class="pull-right">
                <a class="btn btn-success icon-plus3" href="{{ route('projects.project.create') }}"> Create New Project</a>
               </div>
            </h4>
                <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                        <li><a data-action="reload"><i onclick="reload()" class="icon-reload"></i></a></li>
                        <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-body collapse in">
                <div class="card-block card-dashboard">
                    <p>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                    </p>
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-bordered table-hover">
                        <thead>
                            <tr>
                            <th>#</th>
                            <th>Project Name</th>
                            <th>Assignee</th>
                            <th>Priority</th>
                            <th>Status</th>
                            {{-- <th>Watchers</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                     {{--  Loop through the lists of Projects --}}
                    @foreach ($projects as $project)
                    {{-- check if the current user has been assigned a ticket --}}
                            @if ($project->assigned_by === (int) Auth::user()->id)
                               <tr>
                                   <td>{{ ++$p }}</td>
                                   <td>{{ $project->first_name}}</td>
                                   <td>{{ $project->last_name}}</td>
                                   <td>{{ $project->email}}</td>
                                   <td>{{ $project->assigned_by}}</td>
                                   <td>{{ $project->status}}</td>
                                   <td>
                                       <a class="btn btn-info icon-eyedropper2" href="{{ route('projects.project.show',$project->id) }}">View</a>
                                       <a class="btn btn-primary icon-pencil-square-o" href="{{ route('projects.project.edit',$project->id) }}">Edit</a>
                                       {!! Form::open(['method' => 'DELETE','route' => ['projects.project.destroy', $project->id],'style'=>'display:inline']) !!}
                                       {!! Form::submit('Delete', ['class' => 'btn btn-danger icon-trash-o']) !!}
                                       {!! Form::close() !!}
                                   </td>
                               </tr>
                               @endif
                               @endforeach
                        </tbody>
                    </table>
                  {{-- {!! $projects->render() !!}   --}}
                  {{ $projects->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
<!-- Responsive tables end -->
</div>
</div>
@endsection

