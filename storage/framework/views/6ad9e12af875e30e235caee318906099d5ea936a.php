<?php $__env->startSection('content'); ?>

    <div class="panel panel-default">

        <div class="panel-heading clearfix">
            
            

           

        </div>

        <div class="panel-body">
        
            <?php if($errors->any()): ?>
                <ul class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('projects.project.store')); ?>" enctype="multipart/form-data" accept-charset="UTF-8" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <?php echo $__env->make('projects.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        
                    </div>
                </div>

            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>