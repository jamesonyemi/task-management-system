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
                 <h4 class="card-title" id="basic-layout-tooltip">Edit Project</h4>
                  <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li id="teamlead"><a><div class="btn btn-info rounded-right"><i></i>Change TeamLead</a></div></li>
                            <li><a data-action="reload"><i  class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                    <div class="card-block">
                        <div class="card-text">
     <div class="row match-height">
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
                                    <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="donationinput4">Team Lead</label>
                                            <select class="form-control" id="team_leader" name="team_leader" >
                                                @foreach ($team_leader as $key => $assignee)
                                                {{-- {{ Form::select('team_leader', $assigned_to,  array('class'=>'form-control')) }} --}}
                                    
                                                <option value="{{ last([$key => $assignee->assigned_to],$key = null, $default = null) }}" {{ old('team_leader', isset($assigned_to->assigned_to) ? $assigned_to->assigned_to : null) == $key ? 'selected' : '' }}>
                                                        {{ $assignee->assigned_to }}
                                            </option> 
                                        
                                    @endforeach
                                   </select>
                                   {!! $errors->first('team_leader', '<p class="help-block">:message</p>') !!}

                                    {{-- <select class="form-control" id="team_leader" name="team_leader" required="true">
                                        <option value="" style="display: none;" {{ old('team_leader', isset($assigned_to->name) ? $assigned_to->name : '') == '' ? 'selected' : '' }} disabled selected>Assigned To</option>
                                        @foreach ($team_leader as $key => $assignee)
                                            <option value="{{ last([$key => $assignee->id],$key = null, $default = null) }}" {{ old('team_leader', isset($assigned_to->name) ? $assigned_to->name : null) == $key ? 'selected' : '' }}>
                                                {{ $assignee->assigned_to }}
                                            </option>
                                        @endforeach
                                    </select> --}}
                                        </div>
                                    </div>

                                <div class="col-md-6">      
                                <div class="form-group">
                                    <div><label>File Attachment</label></div>
                                    <label id="file" class="file center-block">
                                        {!! Form::file('blob_id', ['multiple'=>'multiple']) !!}
                                        <span class="file-custom"></span>
                                    </label>
                                </div>
                                </div>
                                </div>
                                </div>
                               {{--  @foreach($projects as $key => $images) --}}

                              {{--   @if(isset($key)) --}}
                                <div>
                                   {{-- <img src="{{ asset('/storage/app/public/back.png') }}"> --}}
                                   {{-- <a href="#"> --}}
                                                 <img src="{{asset('/storage/blob/created_by - Mrs. Willie Smitham Jr., user_id - 3/1551973241.png')}}" alt="Logo Image"/>
                                               {{-- </a> --}}
                                </div>
                                <div class="mid">
                                <form>
                                    <input type="hidden" name="assigned_to">
                                </form>
                                    
                                </div>
                                {{-- @endif --}}
                                {{-- @endforeach --}}
                            </div>

                            </div>

                    </div>
                </div>
            </div>

            <div class="row" style="float:right; margin-top:-50px; border-top: 0px solid #141e25 !important;">
                <div class="col-md-6">
                    <div class="form-group">
                        <a href="{{ route('projects.project.index') }}"> 
                        <button type="button" class="btn btn-warning mr-1" >
                           <i class="icon-cross2" ></i> Cancel
                        </button>
                        </a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary" name="update" id="update">
                            <i class="icon-check2"></i> Update
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>

<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>
