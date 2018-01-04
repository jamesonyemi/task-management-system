<?php $__env->startSection('content'); ?>

    <div class="panel panel-default card card-header">

        <div class="panel-heading clearfix">
            
            <span class="pull-left">
                <h4 class="mt-5 mb-5">Create New Project</h4>
            </span>

            <div class="btn-group btn-group-sm pull-right push-xs-10  offset-xl-1 col-form-label" role="group">
                <a href="<?php echo e(route('asset_categories.asset_category.index')); ?>" class="btn btn-primary" title="Show All Asset Category">Show
                    <span class="glyphicon glyphicon-th-list" aria-hidden="true"></span>
                </a>
            </div>

        </div>

        <div class="panel-body">
        
            <?php if($errors->any()): ?>
                <ul class="alert alert-danger">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li><?php echo e($error); ?></li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('asset_categories.asset_category.store')); ?>" accept-charset="UTF-8" class="form-horizontal">
            <?php echo e(csrf_field()); ?>

            <?php echo $__env->make('asset_categories.form', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input class="btn btn-primary" type="submit" value="Create">
                    </div>
                </div>

            </form>

        </div>
    </div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>