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
                <li class="breadcrumb-item"><a href="index.html">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="#">Form Layouts</a>
                </li>
                <li class="breadcrumb-item active"><a href="#">Basic Forms</a>
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
                                    <input type="text" id="issueinput1" class="form-control" placeholder="issue title" name="issuetitle" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Issue Title">
                                </div>

                                <div class="form-group">
                                    <label for="issueinput2">Opened By</label>
                                    <input type="text" id="issueinput2" class="form-control" placeholder="opened by" name="openedby" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Opened By">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="issueinput3">Date Opened</label>
                                            <input type="date" id="issueinput3" class="form-control" name="dateopened" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Opened">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="issueinput4">Date Fixed</label>
                                            <input type="date" id="issueinput4" class="form-control" name="datefixed" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Date Fixed">
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
                                    <label for="issueinput8">Comments</label>
                                    <textarea id="issueinput8" rows="5" class="form-control" name="comments" placeholder="comments" data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"></textarea>
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

                                <div class="form-group">
                                    <label for="donationinput1">Full Name</label>
                                    <input type="text" id="donationinput1" class="form-control square" placeholder="name" name="fullname">
                                </div>

                                <div class="form-group">
                                    <label for="donationinput2">Email</label>
                                    <input type="email" id="donationinput2" class="form-control square" placeholder="email" name="email">
                                </div>

                                <div class="form-group">
                                    <label for="donationinput3">Contact Number</label>
                                    <input type="tel" id="donationinput3" class="form-control square" name="contact">
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4">Dontaion Type</label>
                                    <input type="text" id="donationinput4" class="form-control square" placeholder="type of donation" name="donationtype">
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
                                    <label for="donationinput7">Comments</label>
                                    <textarea id="donationinput7" rows="5" class="form-control square" name="comments" placeholder="comments"></textarea>
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
   