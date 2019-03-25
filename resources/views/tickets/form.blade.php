{{-- 
<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Assigned By:</strong>
            {!! Form::text('assigned_by', null, array('placeholder' => 'Assigned by','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Email:</strong>
            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div> --}}

</div>
</div>
</div>


<div class="app-content content container-fluid">
<div class="content-wrapper">
  <div class="content-header row">
    <div class="content-header-left col-md-6 col-xs-12 mb-1">
      <h2 class="content-header-title"></h2>
    </div>
    <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
      <div class="breadcrumb-wrapper col-xs-12">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{ route('tickets.tickets.index') }}">Back</a>
          </li>
          <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
          </li>
          <li class="breadcrumb-item active"><a href="{{ route('tickets.tickets.create') }}">Issue Tracking</a>
          </li>
        </ol>
      </div>
    </div>
  </div>
  <div class="content-body"><!-- Basic form layout section start -->
<section id="basic-form-layouts">




<div class="row match-height">
  <div class="col-md-12">
      <div class="card">
          
          <div class="card-body collapse in">
          <div class="card-header">
              <h4 class="card-title" id="basic-layout-tooltip">Issue Tracking</h4>
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
              <div class="card-block">
                  <div class="card-text">
<div class="row match-height">
<form class="form" method="POST" action="{{  route('tickets.tickets.create') }} ">
  {{ csrf_field() }}
  <div class="col-md-6">
      <div class="card">
          <div class="card-body collapse in">
              <div class="card-block">

                  <div class="card-text">
                      {{ @$message }}
                  </div>

                  <div class="form-body">
                  <div class="row">
                  <div class="col col-md-12">
                  <div class="row">
                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="issueinput1">Issue Title</label>
                          {!! Form::text('issue_title', null, array('placeholder' => 'issue title','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Issue Title"')) !!}
                      </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="issueinput5">Priority</label>
                      
                      {!! Form::select('priority',['Normal'=>'Normal','Low'=>'Low','High'=>'High','Urgent'=>'Urgent'], Null, array('placeholder' => 'Select Priority','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority"')) !!}
                      
                  </div>
                  </div>
                  <div class="form-group">
                      {!! Form::hidden('created_by', Auth::user()->id, array('placeholder' => 'Assigned by','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Assigned By"')) !!}
                  </div>
               
                  </div>
                  </div>
                  </div>
                  <div class="row">
                  <div class="col col-md-12">
                  <div class="row">
                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="donationinput4">Assignee</label>
                      <select class="form-control" id="assignee" name="assignee" required="true">
                      
                          @foreach ($assigned_to as $key => $assignee)
                              <option value="{{ $assignee }}" {{ old('assignee', isset($assigned_to->name) ? $assigned_to->name : 'null') == $key ? 'selected' : '' }}>
                                  {{ $assignee }}
                              </option>
                          @endforeach
                      </select>
                      
                      {!! $errors->first('assignee', '<p class="help-block">:message</p>') !!}

                  </div>
                  </div>
                  <div class="col-md-6">
                  <div class="form-group">
                      <label for="timesheetinput2">Project Name</label>
                      <div class="position-relative has-icon-left">

                           <select class="form-control" id="project_name" name="project_id" required="true">
                          
                               @foreach ($projects as $key => $projectName)
                                   <option value="{{ $projectName->id }}" {{ old('project_id', isset($projects->name) ? $projects->name : 'null') == $key ? 'selected' : '' }}>
                                       {{ $projectName->name }}
                                   </option>
                               @endforeach

                           </select>

                               {!! $errors->first('project_name', '<p class="help-block">:message</p>') !!}
                          <div class="form-control-position"> <i class="icon-briefcase4"></i></div> 
                      </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                          <div class="row">
                          <div class="col col-md-12">
                          <div class="row">
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="projectinput4">Open Date</label>
                                      <div class="position-relative has-icon-left">
                                      <input type="text" id="open_date" value="{{gmdate("Y-m-d H:i:s")}}" class="form-control" name="open_date">
                                      <div class="form-control-position">
                                          <i class="icon-calendar5"></i>
                                      </div>
                                  </div>
                                  </div>
                              </div>
                              <div class="col-md-6">
                                  <div class="form-group">
                                      <label for="projectinput4">Due Date</label>
                                      <div class="position-relative has-icon-left">
                                      <input type="text" id="due_date" value="{{gmdate("Y-m-d H:i:s",strtotime('+5 days'))}}" class="form-control" name="due_date">
                                      <div class="form-control-position">
                                          <i class="icon-calendar5"></i>
                                      </div>
                                  </div>
                                  </div>
                              </div>
                          </div>
                          </div>
                       </div>

                       @if ( ($statusOnEditMode) )
                       <div class="form-group">
                             <label for="issueinput6">Status</label>
     
                             {!! Form::select('status',['Open'=>'Open','Cancelled'=>'Cancelled','On Hold'=>'On Hold','In Progress'=>'In Progress','Completed'=>'Completed'], NUll, array('placeholder' => 'Select Status','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status"')) !!}
                         </div>
                       
                       @else
                       <p></p>
                       @endif
                          <div class="form-group">
                              <label for="issueinput8">Description</label>

                              {!! Form::textarea('description', null, array('style='=>'height:100px;','id'=>'description','placeholder' => 'Description the issue you are currently facing','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"')) !!}


                          </div>

                          
                          <div class="form-actions right" style="float:right; margin-top:25px;">
                              <a href="{{ route('tickets.tickets.index') }}"> 
                              <button type="button" class="btn btn-outline-danger mr-1 btn-min-width mr-1 mb-1" >
                                 <i class="icon-cross2" ></i> Cancel
                              </button>
                              </a>
                              <button type="submit" class="btn btn-outline-success btn-min-width mr-1 mb-1">
                                  <i class="icon-check2"></i> Save
                              </button>
                       </div>
                      
                 {{--  </form> --}}

              </div>
          </div>
      </div>
    </div>
  </div>
</form>

{{-- secon secton starts here --}}

{{-- <div class="col-md-6">
        <h1><p>Display Created Ticket</p></h1>
        <div class="card">
            <div class="card-body collapse in">
                <div class="card-block"> --}}

                    {{-- <div class="card-text">
                        {{ @$message }}
                    </div> --}}

                    

                        {{-- <div class="form-body"> --}}
                                
                            {{-- {{ Continue adding more input fields from this section below }} --}}
                        {{-- </div>
                </div>
            </div>
        </div>
    </div> --}}


{{-- end of second section --}}

<div class="col-xl-6 col-lg-12">
        <div class="card">
            <div class="card-header no-border-bottom">
                <h4 class="card-title">All Issue Created</h4>
                <a class="heading-elements-toggle"><i class="ft-more-horizontal font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content">
                <div id="daily-activity" class="table-responsive height-350">
                    <table class="table table-hover mb-0">
                        <thead>
                            <tr>
                                {{-- <th>#</th> --}}
                                <th>Status</th>
                                <th>Priority</th>
                                <th>Open Date</th>
                            </tr>
                        </thead>
                        @foreach ($tickets as $ticket)
                        @if ( (int)$ticket->created_by === (int)Auth::user()->id )
                        <tbody>
                            <tr>
                                {{-- <td>{{ ++$p }}</td> --}}
                                {{-- @if ( !is_null($ticket->description) )
                                <td class="text-truncate"> {!! $ticket->description !!} </td>
                                @else
                                <td class="text-truncate"><i>NULL</i></td>
                                @endif --}}
                                <td class="text-truncate">
                                    {{-- <span class="tag tag-success"></span> --}}
                                    @switch($ticket->status)
                                    @case('In Progress')
                                    {{-- <div class="tag tag-default tag-info">In Progress</div> --}}
                                    <span class="tag tag-info">In Progress</span>
                                    @break
                                    
                                    @case('Cancelled')
                                    {{-- <div class="tag tag-default tag-danger">Cancelled</div> --}}
                                    <span class="tag tag-danger">Cancelled</span>
                                    @break
                                    
                                    @case('On Hold')
                                    {{-- <div class="tag tag-default tag-warning">On Hold</div> --}}
                                    <span class="tag tag-warning">On Hold</span>
                                    @break
                                    
                                    @case('Completed')
                                    {{-- <div class="tag tag-default tag-success">Completed</div> --}}
                                    <span class="tag tag-success">Completed</span>
                                    @break
                                    @default
                                    {{-- <div class="tag tag-default tag-primary">Open</div> --}}
                                    <span class="tag tag-primary">Open</span>
                                    @endswitch
                                </td>
                                <td class="text-truncate">
                                    {{-- <span class="tag tag-success"></span> --}}
                                    @switch($ticket->priority)
                                    @case('Normal')
                                    {{-- <div class="tag tag-default tag-info">In Progress</div> --}}
                                       <span class="tag tag-warning">Normal</span>
                                       @break
                                       
                                       @case('Urgent')
                                       @case('High')
                                       {{-- <div class="tag tag-default tag-danger">Cancelled</div> --}}
                                       <span class="tag tag-danger">{{ old('priority', isset($ticket->priority) ? $ticket->priority : 'null') }}</span>
                                       @break
                                       
                                       @case('Low')
                                       {{-- <div class="tag tag-default tag-success">Completed</div> --}}
                                       <span class="tag tag-info">Completed</span>
                                       @break
                                       @default
                                       {{-- <div class="tag tag-default tag-primary">Open</div> --}}
                                       {{-- <span class="tag tag-primary">Open</span> --}}
                                       @endswitch
                                    </td>
                                    <td class="text-truncate">{{ $ticket->open_date }}</td>
                            </tr>
             
                        </tbody>
                        @endif
                        @endforeach
                    </table>
                  {{ $tickets->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Running Routes & Daily Activities  -->

</div>
</section>
<!-- // Basic form layout section end -->
</div>
</div>
</div> 
<style>
.ck-editor__editable {
min-height: 200px !important;
}

</style>
@section('scripts')
{{-- <script src="{{ asset('js/ajax_request.js') }}"></script> --}}
<script src="https://cdn.ckeditor.com/ckeditor5/12.0.0/classic/ckeditor.js"></script>
<script>
ClassicEditor
  .create( document.querySelector( '#description' ) )
  .catch( error => {
      console.error( error );
  } );

</script>

@endsection
