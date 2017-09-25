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
                <li class="breadcrumb-item"><a href="{{ route('tasks.index') }}">Back</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="{{ route('tasks.create') }}">Issue Tracking</a>
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
     <form class="form">
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
                                    <input type="text" id="issueinput1" class="form-control" placeholder="issue title" name="issue_title" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>

                                <div class="form-group">
                                    <label for="timesheetinput1">Employee Name</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" id="timesheetinput1" class="form-control" placeholder="Employee name" name="employee_name">
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="issueinput2">Opened By</label>
                                    <input type="text" id="issueinput2" class="form-control" placeholder="opened by" name="assigned_by" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Opened By">
                                </div>


                                <div class="col col-md-12">
                                <label for="timesheetinput3">Date Opened</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="timesheetinput3" value="{{gmdate("Y")}}" class="form-control" name="date_opened">
                                            <div class="form-control-position">
                                                <i class="icon-calendar5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-4">
                                    <div class="form-group">
                                        {{-- <label for="timesheetinput3">Date Fixed</label> --}}
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="timesheetinput3" class="form-control" value="{{gmdate("F")}}" name="date_fixed">
                                            <div class="form-control-position">
                                                <i class="icon-calendar5"></i>
                                            </div>
                                        </div>
                                    </div>

                                    </div>

                                    <div class="col-md-3">
                                    <div class="form-group">
                                        {{-- <label for="timesheetinput3">Date Fixed</label> --}}
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="timesheetinput3" class="form-control" value="{{gmdate("d")}}" name="date_fixed">
                                            <div class="form-control-position">
                                                <i class="icon-calendar5"></i>
                                            </div>
                                        </div>
                                    </div>

                                    </div>
                                </div>


                                <label for="timesheetinput3">Date Fixed</label>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="timesheetinput3" value="{{gmdate("Y")}}" class="form-control" name="date_opened">
                                            <div class="form-control-position">
                                                <i class="icon-calendar5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-md-4">
                                    <div class="form-group">
                                        {{-- <label for="timesheetinput3">Date Fixed</label> --}}
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="timesheetinput3" class="form-control" value="{{date("F")}}" name="date_fixed">
                                            <div class="form-control-position">
                                                <i class="icon-calendar5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                           {{--  <select><option>
                                                <li>oooooooooooooo </li>
 --}}
                                              {{--   {{ List all months here}} --}}

                                            {{-- </option>
                                            <option>
                                                <li>
                                                 ssssssssss   

                                                </li>
                                            </option>
                                            </select> --}}

                                    <div class="col-md-3">
                                    <div class="form-group">
                                        {{-- <label for="timesheetinput3">Date Fixed</label> --}}
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="timesheetinput3" class="form-control" value="{{date("d", strtotime("+5 days"))}}" name="date_fixed">
                                            <div class="form-control-position">
                                                <i class="icon-calendar5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                  </div>
                                 </div>


                                <div class="form-group">
                                    <label for="issueinput5">Priority</label>
                                    <select id="issueinput5" name="priority" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority">
                                        <option value="low">Low</option>
                                        <option value="medium">Medium</option>
                                        <option value="high">High</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="issueinput6">Status</label>
                                    <select id="issueinput6" name="status" class="form-control" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status">
                                        <option value="not started">Not Started</option>
                                        <option value="started">Started</option>
                                        <option value="fixed">Fixed</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Select File</label>
                                    <label id="projectinput7" class="file center-block">
                                        <input type="file" id="file" name="blob[]" multiple>
                                        <span class="file-custom"></span>
                                    </label>
                                </div>

                                <div class="form-group">
                                    <label for="issueinput8">Description</label>
                                    <textarea id="issueinput8" rows="5" class="form-control" name="description" placeholder="Description the issue you are currently facing" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"></textarea>
                                </div>

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
                                            <input type="text" id="projectinput1" class="form-control" placeholder="First Name" name="first_name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">Last Name</label>
                                            <input type="text" id="projectinput2" class="form-control" placeholder="Last Name" name="last_name">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="donationinput2">Email</label>
                                    <input type="email" id="donationinput2" class="form-control square" placeholder="Email" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="donationinput3">Contact Number</label>
                                    <input type="tel" id="donationinput3" class="form-control square" name="phone_number">
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4">Assignee</label>
                                    <input type="text" id="donationinput4" class="form-control square" placeholder="type of donation" name="assignee">
                                </div>

                                <div class="form-group">
                                    <label for="timesheetinput2">Project Name</label>
                                    <div class="position-relative has-icon-left">
                                        <input type="text" id="timesheetinput2" class="form-control" placeholder="project_name" name="projectname">
                                        <div class="form-control-position">
                                            <i class="icon-briefcase4"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Amount</label>
                                    <div class="input-group">
                                        <span class="input-group-addon">$</span>
                                        <input type="text" class="form-control square" placeholder="amount" aria-label="Amount (to the nearest dollar)" name="amount">
                                        <span class="input-group-addon">.00</span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="timesheetinput7">Notes</label>
                                    <div class="position-relative has-icon-left">
                                        <textarea id="timesheetinput7" rows="5" class="form-control" name="note" placeholder="notes"></textarea>
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
                <button type="button" class="btn btn-warning mr-1" onclick="reload()" >
                    <i class="icon-cross2" ></i> Cancel
                </button>
                <button type="submit" class="btn btn-primary">
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
   