<div class="content-wrapper"> 
        <div class="content-header row">
          <div class="content-header-left col-md-6 col-xs-12 mb-1">
            <h2 class="content-header-title"></h2>
          </div>
          <div class="content-header-right breadcrumbs-right breadcrumbs-top col-md-6 col-xs-12">
            <div class="breadcrumb-wrapper col-xs-12">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo e(route('projects.project.index')); ?>">Back</a>
                </li>
                <li class="breadcrumb-item"><a href="<?php echo e(route('home')); ?>">Home</a>
                </li>
                <li class="breadcrumb-item active"><a href="<?php echo e(route('projects.project.create')); ?>">Project</a>
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
                            <li><a data-action="reload"><i onclick="reload()" class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                            <li><a data-action="close"><i class="icon-cross2"></i></a></li>
                        </ul>
                    </div>
                </div>
                    <div class="card-block">
                        <div class="card-text">
     <div class="row match-height">
     <form class="form" method="POST" action="<?php echo e(route('projects.project.create')); ?>" enctype="multipart/form-data">
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
                                    <label for="project_name">Project</label>
                                    <?php echo Form::text('name', null, array('placeholder' => 'Name of Project','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Project Name"')); ?>

                                </div>

                                <div class="form-group">
                                    <label for="timesheetinput1">Client Name</label>
                                    <div class="position-relative has-icon-left">
                                        <?php echo Form::text('company_name', null, array('placeholder' => 'Name of Client','class' => 'form-control square','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Client name"')); ?>

            
                                        <div class="form-control-position">
                                            <i class="icon-head"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <?php echo Form::hidden('created_by', Auth::user()->id, array('placeholder' => 'Assigned by','class' => 'form-control','data-toggle="tooltip"', 'data-trigger="hover" data-placement="top" data-title="Assigned By"')); ?>

                                </div>


                                

                                


                                <div class="form-group">
                                    <label for="issueinput5">Priority</label>

                                    <?php echo Form::select('priority',['normal'=>'normal','low'=>'low','high'=>'high','urgent'=>'urgent','medium'=>'medium'], 'normal', array('placeholder' => '','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Priority"')); ?>

                                </div>

                                <div class="form-group">
                                    <label for="issueinput6">Status</label>

                                    <?php echo Form::select('status',['Open'=>'Open','Cancelled'=>'Cancelled','On Hold'=>'On Hold','In Progress'=>'In Progress','Completed'=>'Completed'], 'Open', array('placeholder' => '','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Status"')); ?>

                                </div>


                                <div class="form-group">
                                <label for="issueinput8">Description</label>
                                 <div class="position-relative has-icon-left">
                                    <?php echo Form::textarea('description', null, array('placeholder' => 'Write About the Project','class' => 'form-control square','data-toggle="tooltip" data-trigger="hover" data-placement="top" data-title="Write About the Project"')); ?>

                                </div>
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
                                        
                                    </div>
                                    <div class="col-md-6">
                                        
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="donationinput2">Email / (Project Lead)</label>

                                    <?php echo Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control square')); ?>


                                </div>

                                <div class="form-group">
                                    <label for="donationinput3">Contact Number / (Project Lead)</label>

                                    <?php echo Form::tel('phone_number', null, array('placeholder' => 'Contact Number','class' => 'form-control square')); ?>

                                </div>

                                <div class="form-group">
                                    <label for="donationinput4">Project Lead</label>
                                    <select class="form-control" id="assigned_to" name="assigned_to" required="true">
                                        <option value="" style="display: none;" <?php echo e(old('assigned_to', isset($assigned_to->name) ? $assigned_to->name : '') == '' ? 'selected' : ''); ?> disabled selected>Assigned To</option>
                                        <?php $__currentLoopData = $assigned_to; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $assignee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e(last([$key => $assignee],$key = null, $default = null)); ?>" <?php echo e(old('assigned_to', isset($assigned_to->name) ? $assigned_to->name : null) == $key ? 'selected' : ''); ?>>
                                                <?php echo e($assignee); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    
                                    <?php echo $errors->first('assigned_to', '<p class="help-block">:message</p>'); ?>


                                </div>

                                

                                <div class="form-group">
                                    <div><label>File Attachment</label></div>
                                    <label id="file" class="file center-block">
                                        <?php echo Form::file('blob[]', ['multiple'=>'multiple']); ?>

                                        <span class="file-custom"></span>
                                    </label>
                                </div>

                              
                            </div>

                            </div>

                    </div>
                </div>
            </div>

            <div class="form-actions right" style="float:right">
                <a href="<?php echo e(route('projects.project.index')); ?>"> 
                <button type="button" class="btn btn-warning mr-1" >
                   <i class="icon-cross2" ></i> Cancel
                </button>
                </a>
                <button type="submit" class="btn btn-primary">
                    <i class="icon-check2"></i> Save
                </button>
            </div>

        </div>
     </form>
    </div>

<!-- // Basic form layout section end -->
        </div>
      </div>
    </div>
