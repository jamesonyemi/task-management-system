<div class="content-wrapper"> 
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title"></h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('projects.project.index') }}">Back</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('projects.project.create') }}">Project</a>
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
                 <h4 class="card-title" id="basic-layout-tooltip">New Project</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="icon-minus4"></i></a></li>
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                    <div class="card-block">
                        <div class="card-text">
     <div class="row match-height">
     {{-- <form class="form" method="POST" action="{{  route('projects.project.create') }}" enctype="multipart/form-data"> --}}
        {{ csrf_field() }}
        <div class="col-md-6">
            <div class="card">
                <div class="card-body collapse in">
                    <div class="card-block">

                        <div class="card-text">
                            {{ @$message }}
                        </div>

                            <div class="form-body">

                                <div class="form-group">
                                    <label for="project_name">Project</label>
                                    {!! Form::text('name', null, array('placeholder' => 'Name of Project','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Project Name"')) !!}
                                </div>

                                <div class="form-group">
                                    <label for="timesheetinput1">Client Name</label>
                                    <div class="position-relative has-icon-left">
                                        {!! Form::text('company_name', null, array('placeholder' => 'Name of Client','class' => 'form-control square','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Client name"')) !!}
            
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    {!! Form::hidden('creator', Auth::user()->name, array('placeholder' => 'Assigned by','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Assigned By"')) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::hidden('user_id', Auth::user()->id, array('placeholder' => 'Assigned by','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Assigned By"')) !!}
                                </div>

                                <div class="form-group">
                                    <label for="issueinput5">Priority</label>

                                     {!! Form::select('priority',['Normal'=>'Normal','Low'=>'Low','High'=>'High','Urgent'=>'Urgent','Medium'=>'Medium'], Null, array('placeholder' => 'Select Priority','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority"')) !!}
                                </div>

                                <div class="form-group">
                                    <label for="issueinput6">Status</label>

                                    {!! Form::select('status',['Open'=>'Open','Cancelled'=>'Cancelled','On Hold'=>'On Hold','In Progress'=>'In Progress','Completed'=>'Completed'], NUll, array('placeholder' => 'Select Status','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status"')) !!}
                                </div>


                                <div class="form-group">
                                <label for="issueinput8">Description</label>
                                {{--  <div class="position-relative has-icon-left"> --}}
                                    {!! Form::textarea('description', null, array('placeholder' => 'Write About the Project','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Write About the Project"')) !!}
                               {{--  </div> --}}
                            </div>
                                {{-- {{ Continue adding more input fields from this section below }} --}}
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body collapse in">
                  <div class="card-block">
                     <div class="card-text"> 
                        </div>
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                      {{-- {{ Continue adding more input fields from this section below }} --}} 
                                    </div>

                                    <div class="col-md-6">
                                      {{-- {{ Continue adding more input fields from this section below }} --}}
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="donationinput2">Email / (Project Lead)</label>

                                    {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control square')) !!}

                                </div>

                                <div class="form-group">
                                    <label for="donationinput3">Contact Number / (Project Lead)</label>

                                    {!! Form::tel('phone_number', null, array('placeholder' => 'Contact Number','class' => 'form-control square')) !!}
                                </div>

                                    <div class="form-group">
                                    <label for="donationinput4">Team Lead</label>
                                    <select class="form-control" id="assigned_to" name="assigned_to" >
                                    @foreach ($teamLead as $key => $teamLead)
                                    
                                        <option value="{{ $teamLead }}" {{ old('assigned_to',) }}>
                                                {{ $teamLead }}
                                            </option>
                                        
                                    @endforeach
                                   </select>
                                   {!! $errors->first('assigned_to', '<p class="help-block">:message</p>') !!}
                                    </div>

                                <div class="form-group">
                                    <div><label>File Attachment</label></div>
                                    <label id="file" class="file center-block">
                                        {!! Form::file('blob_id', ['multiple'=>'multiple']) !!}
                                        <span class="file-custom"></span>
                                    </label>
                                </div>
                               {{--  @foreach($projects as $key => $images) --}}

                              {{--   @if(isset($key)) --}}
                                <div>
                                   {{-- <img src="{{ asset('/storage/app/public/back.png') }}"> --}}
                                   {{-- <a href="#"> --}}
                                                {{--  <img src="{{asset('/storage/blob/created_by - Mrs. Willie Smitham Jr., user_id - 3/1551973241.png')}}" alt="Logo Image"/> --}}
                                               {{-- </a> --}}
                                </div>
                                {{-- @endif --}}
                                {{-- @endforeach --}}
                            </div>

                            </div>

                    </div>
                </div>
            </div>

            <div class="form-actions right" style="float:right; border-top: 0px solid #141e25 !important;">
                <a href="{{ route('projects.project.index') }}"> 
                <button type="button" class="btn btn-warning mr-1" >
                   <i class="icon-cross2" ></i> Cancel
                </button>
                </a>
                <button type="submit" class="btn btn-primary" name="save" id="save">
                    <i class="icon-check2"></i> Save
                </button>
            </div>

        </div>
     {{-- </form> --}}
    </div>

<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>
