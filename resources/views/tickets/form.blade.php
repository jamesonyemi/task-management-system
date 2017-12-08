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

                                <div class="form-group">
                                    <label for="issueinput1">Issue Title</label>
                                    {!! Form::text('issue_title', null, array('placeholder' => 'issue title','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Issue Title"')) !!}
                                    {{-- <input type="text" id="issueinput1" class="form-control" placeholder="issue title" name="issue_title" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Issue Title"> --}}
                                </div>

                                <div class="form-group">
                                    <label for="timesheetinput1">Employee Name</label>
                                    <div class="position-relative has-icon-left">
                                        {!! Form::text('employee_name', null, array('placeholder' => 'Employee name','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Employee name"')) !!}
                                       
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                    </div>
                                </div>

                                 <div class="form-group">
                                    {!! Form::hidden('assigned_by', Auth::user()->id, array('placeholder' => 'Assigned by','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Assigned By"')) !!}
                                </div>

                                <div class="form-group">
                                {!! Form::hidden('project_id', Auth::user()->id, array('placeholder' => 'Assigned by','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Assigned By"')) !!}
                                   
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

                                <div class="form-group">
                                    <label for="issueinput5">Priority</label>

                                    {!! Form::select('priority',['Normal'=>'Normal','Low'=>'Low','High'=>'High','Urgent'=>'Urgent','Medium'=>'Medium'], 'Normal', array('placeholder' => '','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority"')) !!}

                                    {{-- <select id="issueinput5" name="priority" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="urgent">Urgent</option>
                                        <option value="high">High</option>
                                    </select> --}}
                                </div>

                                <div class="form-group">
                                    <label for="issueinput6">Status</label>

                                    {!! Form::select('status',['Open'=>'Open','Cancelled'=>'Cancelled','On Hold'=>'On Hold','In Progress'=>'In Progress','Completed'=>'Completed'], 'Open', array('placeholder' => '','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status"')) !!}

                                   {{--  <select id="issueinput6" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status">
                                        <option value="started">Started</option>
                                        <option value="not started">Not Started</option>
                                        <option value="started">Started</option>
                                        <option value="fixed">Fixed</option>
                                    </select> --}}
                                </div>

                                {{-- <div class="form-group">
                                    <label>Select File</label>
                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="file" name="blob[]" multiple>
                                        <span class="file-custom"></span>
                                    </label>
                                </div> --}}

                                <div class="form-group">
                                    <label for="issueinput8">Description</label>

                                    {!! Form::textarea('description', null, array('placeholder' => 'Description the issue you are currently facing','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"')) !!}

                                   {{--  <textarea id="issueinput8" rows="5" class="form-control" name="description" placeholder="Description the issue you are currently facing" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"></textarea> --}}


                                </div>
                                <div class=" row col col-md-12">{!! Form::label('watchers', 'Watchers', ['class' => 'form-label']) !!}</div>

                                @foreach ($watchers as $watcher)
            
                                <label class="display-inline-block custom-control custom-checkbox">
                                <input type="checkbox" id="checkbox2" name="watchers" class="custom-control-input" 
                                 value="{{ $watcher->name }}">
                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">
                                     {{ $watcher->name }}
                                </span>
                                </label> 
                                @endforeach
                            </div>

                            
                       {{--  </form> --}}
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
              {{--  --}}
                <div class="card-body collapse in">
                    <div class="card-block">

                        <div class="card-text">
                            
                        </div>

                       {{--  <form class="form"> --}}
                            <div class="form-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput1">First Name</label>

                                            {!! Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')) !!}


                                           {{--  <input type="text" id="projectinput1" class="form-control" placeholder="First Name" name="first_name"> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">Last Name</label>

                                            {!! Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')) !!}

                                            {{-- <input type="text" id="projectinput2" class="form-control" placeholder="Last Name" name="last_name"> --}}
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="donationinput2">Email</label>

                                    {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control square')) !!}

                                    {{-- <input type="email" id="donationinput2" class="form-control square" placeholder="Email" name="email"> --}}
                                </div>

                                <div class="form-group">
                                    <label for="donationinput3">Contact Number</label>

                                    {!! Form::tel('phone_number', null, array('placeholder' => 'Contact Number','class' => 'form-control square')) !!}

                                    {{-- <input type="tel" id="donationinput3" class="form-control square" name="phone_number"> --}}
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4">Assignee</label>

                                    {!! Form::text('assignee', null, array('placeholder' => 'Assignee','class' => 'form-control square')) !!}

                                   {{--  <input type="text" id="donationinput4" class="form-control square" placeholder="type of donation" name="assignee"> --}}
                                </div>

                                <div class="form-group">
                                    <label for="timesheetinput2">Project Name</label>
                                    <div class="position-relative has-icon-left">

                                         {!! Form::text('project_name', null, array('placeholder' => 'Project Name','class' => 'form-control square')) !!}

                                       {{--  <input type="text" id="timesheetinput2" class="form-control" placeholder="Project Name" name="project_name"> --}}
                                        <div class="form-control-position">
                                            <i class="icon-briefcase4"></i>
                                        </div>
                                    </div>
                                </div>

                                {{-- <div class="form-group">
                                    <label>Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control square" placeholder="amount" aria-label="Amount (to the nearest dollar)" name="amount">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div> --}}

                                <div class="form-group">
                                    <label for="timesheetinput7">Notes</label>
                                    <div class="position-relative has-icon-left">
                                         {!! Form::textarea('note', null, array('placeholder' => 'Notes','class' => 'form-control square')) !!}
                                         
                                       {{--  <textarea id="timesheetinput7" rows="5" class="form-control" name="note" placeholder="notes"></textarea> --}}
                                        <div class="form-control-position">
                                            <i class="icon-file2"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            </div>

                    </div>
                </div>
            </div>
            

            <div class="form-actions right" style="float:right">
                <a href="{{ route('tickets.tickets.index') }}"> 
                <button type="button" class="btn btn-outline-danger mr-1 btn-min-width mr-1 mb-1" >
                   <i class="icon-cross2" ></i> Cancel
                </button>
                </a>
                <button type="submit" class="btn btn-outline-success btn-min-width mr-1 mb-1">
                    <i class="icon-check2"></i> Save
                </button>
            </div>

        </div>
     </form>
    </div>
                           


    
</section>
<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
   