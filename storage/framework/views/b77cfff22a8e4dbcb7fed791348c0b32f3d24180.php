<?php $__env->startSection('content'); ?>

<div>
<div class="content-wrapper">
<!-- Responsive tables start -->
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
            <h4 class="card-title">
                <div class="pull-right">
                <a class="btn btn-success icon-plus3" href="<?php echo e(route('tickets.tickets.create')); ?>"> Create New Ticket</a>
               

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
                    
                </div>
                <div class="table-responsive">
                    <table class="table mb-0 table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>First Name</th>
                                <th>Last Name</th>
                                <th>Email</th>
                                <th>Assigned By</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
              
                     <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        
              
                     <?php if( (int)$ticket->assigned_by === (int)Auth::user()->id && Auth::user()->email === $ticket->email ): ?>
                           <tbody>
                               <tr>
                                   <td><?php echo e(++$p); ?></td>
                                   <td><?php echo e($ticket->first_name); ?></td>
                                   <td><?php echo e($ticket->last_name); ?></td>
                                   <td><?php echo e($ticket->email); ?></td>
                                   <td><?php echo e($ticket->assigned_by); ?></td>
                                   <td>
                                   <?php switch($ticket->status):
                                    case ('In Progress'): ?>
                                       <div class="tag tag-default tag-info">In Progress</div>
                                        <?php break; ?>

                                    <?php case ('Cancelled'): ?>
                                       <div class="tag tag-default tag-danger">Cancelled</div>
                                        <?php break; ?>

                                    <?php case ('On Hold'): ?>
                                       <div class="tag tag-default tag-warning">On Hold</div>
                                        <?php break; ?>

                                    <?php case ('Completed'): ?>
                                       <div class="tag tag-default tag-success">Completed</div>
                                        <?php break; ?>
                                    <?php default: ?>
                                        <div class="tag tag-default tag-primary">Open</div>
                                  <?php endswitch; ?>
                                   <td>
                                       <a class="btn btn-info icon-open" href="<?php echo e(route('tickets.tickets.show',$ticket->id)); ?>"></a>
                                       <a class="btn btn-primary icon-pencil-square-o" href="<?php echo e(route('tickets.tickets.edit',$ticket->id)); ?>"></a>
                                       
                                       <?php echo Form::close(); ?>

                                   </td>
                               </tr>
                            </tbody>
                       <?php endif; ?>  
                       <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </table>
                  
                  <?php echo e($tickets->links('vendor.pagination.bootstrap-4')); ?>

            </div>
        </div>
    </div>
</div>
<!-- Responsive tables end -->

        </div>
      </div>
   </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>