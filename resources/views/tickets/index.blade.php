@extends('layouts.master')

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
                <a class="btn btn-success icon-plus3" href="{{ route('tickets.tickets.create') }}"> Create New Ticket</a>
               {{--  <a class="btn btn-success icon-plus3" href="{{ route('mail.ticket.complete') }}"> Completed</a> --}}

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
                    {{-- <p>
                        @if ($message = Session::get('success'))
                            <div class="alert alert-success">
                              <p>
                                  {{ $message }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                              </p>
                            </div>
   
                        @endif
                    </p> --}}
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                {{-- <th>First Name</th> --}}
                                {{-- <th>Last Name</th> --}}
                                {{-- <th>Email</th> --}}
                                {{-- <th>Assigned By</th> --}}
                                <th>Description</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
              {{--  Loop through the lists of Projects --}}
                     @foreach ($tickets as $ticket)
                        
              {{-- check if the current user has been assigned a ticket --}}
                     @if ( (int)$ticket->created_by === (int)Auth::user()->id )
                           <tbody>
                               <tr>
                                   <td>{{ ++$p }}</td>
                                   {{-- <td>{{ $ticket->first_name}}</td> --}}
                                   {{-- <td>{{ $ticket->last_name}}</td> --}}
                                   {{-- <td>{{ $ticket->email}}</td> --}}
                                   {{-- <td>{{ $ticket->assigned_by}}</td> --}}
                                   <td>{!! $ticket->description !!}</td>
                                   <td>
                                   @switch($ticket->status)
                                    @case('In Progress')
                                       <div class="tag tag-default tag-info">In Progress</div>
                                        @break

                                    @case('Cancelled')
                                       <div class="tag tag-default tag-danger">Cancelled</div>
                                        @break

                                    @case('On Hold')
                                       <div class="tag tag-default tag-warning">On Hold</div>
                                        @break

                                    @case('Completed')
                                       <div class="tag tag-default tag-success">Completed</div>
                                        @break
                                    @default
                                        <div class="tag tag-default tag-primary">Open</div>
                                  @endswitch
                                   <td>
                                       <a class="btn btn-info icon-open" href="{{ route('tickets.tickets.show',$ticket->id) }}"></a>
                                       <a class="btn btn-primary icon-pencil-square-o" href="{{ route('tickets.tickets.edit',$ticket->id) }}"></a>
                                       {{-- {!! Form::open(['method' => 'DELETE','route' => ['tickets.tickets.destroy', $ticket->id],'style'=>'display:inline']) !!}
                                       {!! Form::button('Delete', ['class' => 'btn btn-danger icon-trash-o']) !!} --}}
                                       {!! Form::close() !!}
                                   </td>
                               </tr>
                            </tbody>
                       @endif  
                       @endforeach
                    </table>
                  {{-- {!! $tickets->render() !!}   --}}
                  {{ $tickets->links('vendor.pagination.bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
<!-- Responsive tables end -->

        </div>
      </div>
   </div>
@endsection

