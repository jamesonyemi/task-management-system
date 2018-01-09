

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
     <form class="form" method="POST" action="<?php echo e(route('tickets.tickets.create')); ?> ">
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
                                    <?php echo Form::hidden('assigned_by', Auth::user()->id, array('placeholder' => 'Assigned by','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Assigned By"')); ?>

                                </div>

                        <?php $__currentLoopData = $project_id; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $project_id): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="form-group">
                                <?php echo Form::text('project_id', $project_id, array('placeholder' => 'Assigned by','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Assigned By"')); ?>

                                
                                            
                                </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                <div class="row">
                                <div class="col col-md-12">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="projectinput4">Open Date</label>
                                            <div class="position-relative has-icon-left">
                                            <input type="text" id="open_date" value="<?php echo e(gmdate("Y-m-d H:i:s")); ?>" class="form-control" name="open_date">
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
                                            <input type="text" id="due_date" value="<?php echo e(gmdate("Y-m-d H:i:s",strtotime('+5 days'))); ?>" class="form-control" name="due_date">
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

                                    <?php echo Form::select('priority',['Normal'=>'Normal','Low'=>'Low','High'=>'High','Urgent'=>'Urgent','Medium'=>'Medium'], Null, array('placeholder' => 'Select Priority','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority"')); ?>


                                </div>

                                <div class="form-group">
                                    <label for="issueinput6">Status</label>

                                    <?php echo Form::select('status',['Open'=>'Open','Cancelled'=>'Cancelled','On Hold'=>'On Hold','In Progress'=>'In Progress','Completed'=>'Completed'], NUll, array('placeholder' => 'Select Status','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status"')); ?>

                                </div>

                                <div class="form-group">
                                    <label for="issueinput8">Description</label>

                                    <?php echo Form::textarea('description', null, array('placeholder' => 'Description the issue you are currently facing','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Comments"')); ?>



                                </div>

                                <div class=" row col col-md-12">

                                    <?php echo Form::label('watchers', 'Watchers', ['class' => 'form-label']); ?>

                                    
                                </div>

                                <?php $__currentLoopData = $watchers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $watcher): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            
                                <label class="display-inline-block custom-control custom-checkbox">
                                <input type="hidden" name="watchers" value="<?php echo e($watcher->email); ?>"> 

                                <input type="checkbox" id="watchers" name="watchers" class="custom-control-input" 
                                 value="<?php echo e($watcher->name); ?>" checked="<?php echo e(old($watcher->name) ?? $watcher->name); ?>">

                                 <span class="custom-control-indicator"></span>
                                 <span class="custom-control-description">
                                     <?php echo e($watcher->name); ?>

                                </span>
                                </label> 
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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

                                    

                                    <select class="form-control" id="assignee" name="assignee" required="true">
                                    
                                        <?php $__currentLoopData = $assigned_to; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $assignee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($assignee); ?>" <?php echo e(old('assignee', isset($assigned_to->name) ? $assigned_to->name : 'null') == $key ? 'selected' : ''); ?>>
                                                <?php echo e($assignee); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <?php echo $errors->first('assignee', '<p class="help-block">:message</p>'); ?>


                                </div>

                                <div class="form-group">
                                    <label for="timesheetinput2">Project Name</label>
                                    <div class="position-relative has-icon-left">

                                         <select class="form-control" id="project_name" name="project_name" required="true">
                                        
                                             <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $projectName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                 <option value="<?php echo e($projectName->name); ?>" <?php echo e(old('project_name', isset($projects->name) ? $projects->name : 'null') == $key ? 'selected' : ''); ?>>
                                                     <?php echo e($projectName->name); ?>

                                                 </option>
                                             <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                         </select>

                                             <?php echo $errors->first('project_name', '<p class="help-block">:message</p>'); ?>

                                        <div class="form-control-position"> <i class="icon-briefcase4"></i></div> 
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
                <a href="<?php echo e(route('tickets.tickets.index')); ?>"> 
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