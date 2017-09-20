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
                <a class="btn btn-success" href="{{ route('tasks.create') }}"> Create New task</a>
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Assigned By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($tasks as $task)
                            {{-- <tr>
                                <th scope="row">1</th>
                                <td>Mark</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                            </tr> --}}
                               <tr>
                                   <td>{{ ++$i }}</td>
                                   <td>{{ $task->name}}</td>
                                   <td>{{ $task->email}}</td>
                                   <td>{{ $task->assigned_by}}</td>
                                   <td>
                                       <a class="btn btn-info" href="{{ route('tasks.show',$task->id) }}">Show</a>
                                       <a class="btn btn-primary" href="{{ route('tasks.edit',$task->id) }}">Edit</a>
                                       {!! Form::open(['method' => 'DELETE','route' => ['tasks.destroy', $task->id],'style'=>'display:inline']) !!}
                                       {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                                       {!! Form::close() !!}
                                   </td>
                               </tr>
                               @endforeach
                        </tbody>
                    </table>
                    {!! $tasks->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Responsive tables end -->

        </div>
      </div>
   
@endsection

