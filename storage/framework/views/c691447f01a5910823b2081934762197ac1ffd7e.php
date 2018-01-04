

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
                <li class="breadcrumb-item"><a href="<?php echo e(route('tickets.tickets.index')); ?>">Back</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="<?php echo e(route('tickets.tickets.create')); ?>">Issue Tracking</a>
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
     <form class="form" method="POST" action="<?php echo e(route('tasks.create')); ?> ">
        <?php echo e(csrf_field()); ?>

        <div class="col-md-6">
            <div class="card">
                <div class="card-body collapse in">
                    <div class="card-block">

                        <div class="card-text">
                            <?php echo e(@$message); ?>

                        </div>

                            <div class="form-body">

                                <div class="form-group">
                                    <label for="issueinput1">Issue Title</label>
                                    <?php echo Form::text('issue_title', null, array('placeholder' => 'issue title','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Issue Title"')); ?>

                                    
                                </div>

                                <div class="form-group">
                                    <label for="timesheetinput1">Employee Name</label>
                                    <div class="position-relative has-icon-left">
                                        <?php echo Form::text('employee_name', null, array('placeholder' => 'Employee name','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Employee name"')); ?>

                                       
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="issueinput2">Assigned By</label>
                                    <?php echo Form::text('assigned_by', null, array('placeholder' => 'Assigned by','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Assigned By"')); ?>

                                    
                                </div>


                                <div class="col col-md-12">
                                <label for="timesheetinput3">Date Opened</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="timesheetinput3" value="<?php echo e(gmdate("Y-m-d H:i:s")); ?>" class="form-control" name="date_opened">
                                            <div class="form-control-position">
                                                <i class="icon-calendar5"></i>
                                            </div>
                                        </div>
                                    </div>
                                    </div>

                                  
                                        
                                     

                                   
                                        
                                    
                                </div>


                                <label for="timesheetinput3">Due Date</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                        <div class="position-relative has-icon-left">
                                            <input type="text" id="timesheetinput3" value="<?php echo e(gmdate("Y-m-d H:i:s",strtotime('+5 days'))); ?>" class="form-control" name="due_date">
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

                                    <?php echo Form::select('priority',['normal'=>'normal','low'=>'low','high'=>'high','urgent'=>'urgent','medium'=>'medium'], null, array('placeholder' => '','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority"')); ?>

                                    
                                </div>

                                <div class="form-group">
                                    <label for="issueinput6">Status</label>

                                    <?php echo Form::select('status',['open'=>'open','cancelled'=>'cancelled','on hold'=>'on hold','in progress'=>'in progress'], null, array('placeholder' => '','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status"')); ?>


                                   
                                </div>

                                

                                <div class="form-group">
                                    <label for="issueinput8">Description</label>

                                    <?php echo Form::textarea('description', null, array('placeholder' => 'Description the issue you are currently facing','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"')); ?>


                                   
                                </div>

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
                                        <div class="form-group">
                                            <label for="projectinput1">First Name</label>

                                            <?php echo Form::text('first_name', null, array('placeholder' => 'First Name','class' => 'form-control')); ?>



                                           
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput2">Last Name</label>

                                            <?php echo Form::text('last_name', null, array('placeholder' => 'Last Name','class' => 'form-control')); ?>


                                            
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="donationinput2">Email</label>

                                    <?php echo Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control square')); ?>


                                    
                                </div>

                                <div class="form-group">
                                    <label for="donationinput3">Contact Number</label>

                                    <?php echo Form::tel('phone_number', null, array('placeholder' => 'Contact Number','class' => 'form-control square')); ?>


                                    
                                </div>

                                <div class="form-group">
                                    <label for="donationinput4">Assignee</label>

                                    <?php echo Form::text('assignee', null, array('placeholder' => 'Assignee','class' => 'form-control square')); ?>


                                   
                                </div>

                                <div class="form-group">
                                    <label for="timesheetinput2">Project Name</label>
                                    <div class="position-relative has-icon-left">

                                         <?php echo Form::text('project_name', null, array('placeholder' => 'Project Name','class' => 'form-control square')); ?>


                                       
                                        <div class="form-control-position">
                                            <i class="icon-briefcase4"></i>
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="form-group">
                                    <label for="timesheetinput7">Notes</label>
                                    <div class="position-relative has-icon-left">
                                         <?php echo Form::textarea('note', null, array('placeholder' => 'Notes','class' => 'form-control square')); ?>

                                         
                                       
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
   