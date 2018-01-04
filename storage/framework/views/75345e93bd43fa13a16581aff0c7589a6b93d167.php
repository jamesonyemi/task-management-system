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
                    <p>
                        <?php if($message = Session::get('success')): ?>
                            <div class="alert alert-success">
                                <p><?php echo e($message); ?></p>
                            </div>
                        <?php endif; ?>
                    </p>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                           <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                               <tr>
                                   <td><?php echo e(++$p); ?></td>
                                   <td><?php echo e($ticket->first_name); ?></td>
                                   <td><?php echo e($ticket->last_name); ?></td>
                                   <td><?php echo e($ticket->email); ?></td>
                                   <td><?php echo e($ticket->assigned_by); ?></td>
                                   <td>
                                       <a class="btn btn-info icon-eyedropper2" href="<?php echo e(route('tickets.tickets.show',$ticket->id)); ?>">View</a>
                                       <a class="btn btn-primary icon-pencil-square-o" href="<?php echo e(route('tickets.tickets.edit',$ticket->id)); ?>">Edit</a>
                                       <?php echo Form::open(['method' => 'DELETE','route' => ['tickets.tickets.destroy', $ticket->id],'style'=>'display:inline']); ?>

                                       <?php echo Form::submit('Delete', ['class' => 'btn btn-danger icon-trash-o']); ?>

                                       <?php echo Form::close(); ?>

                                   </td>
                               </tr>
                               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
                  
                  <?php echo e($tickets->links('vendor.pagination.bootstrap-4')); ?>

            </div>
        </div>
    </div>
</div>
<!-- Responsive tables end -->

        </div>
      </div>
   
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>