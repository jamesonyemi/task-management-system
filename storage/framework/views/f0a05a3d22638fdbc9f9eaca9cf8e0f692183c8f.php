<?php $__env->startSection('content'); ?>

    <?php if(Session::has('success_message')): ?>
        <div class="alert alert-success">
            <span class="glyphicon glyphicon-ok"></span>
            <?php echo session('success_message'); ?>


            <button type="button" class="close" data-dismiss="alert" aria-label="close">
                <span aria-hidden="true">&times;</span>
            </button>

        </div>
    <?php endif; ?>

    <div class="panel panel-default card">

        <div class="panel-heading clearfix">

            <div class="pull-left">
                <h4 class="mt-5 mb-5"><?php echo e('Projects'); ?></h4>
            </div><br>

            <div class="btn-group btn-group-sm pull-right" role="group">
                <a href="<?php echo e(route('asset_categories.asset_category.create')); ?>" class="btn btn-success" title="Create New Asset Category">New Asset
                    <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                </a>
            </div>

        </div>
        
        <?php if(count($assetCategories) == 0): ?>
            <div class="panel-body text-center">
                <h4>No Asset Categories Available!</h4>
            </div>
        <?php else: ?>
        <div class="panel-body panel-body-with-table card-header">
            <div class="table-responsive">

                <table class="table mb-0 table-bordered table-hover">
                    <thead>
                        <div class="card-header">
                        <tr  style="background-color: teal; color:white;">
                            <th>Name</th>
                             <th>Description</th>
                            <th>Status</th>

                            <th></th>
                        </tr>
                    </div>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $assetCategories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $assetCategory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($assetCategory->name); ?></td>
                            <td><?php echo e($assetCategory->description); ?></td>
                            <td> 

                                <?php switch($assetCategory->is_active):
                                    case (1): ?>
                                       <div class="tag tag-default tag-success">Active</div>
                                        <?php break; ?>

                                    <?php case (0): ?>
                                       <div class="tag tag-default tag-warning">In active</div>
                                        <?php break; ?>

                                    <?php default: ?>
                                        <div class="tag tag-default tag-danger">No Status</div>
                                <?php endswitch; ?>
                            
                           </td>

                            <td>

                                <form method="POST" action="<?php echo route('asset_categories.asset_category.destroy', $assetCategory->id); ?>" accept-charset="UTF-8">
                                <input name="_method" value="DELETE" type="hidden">
                                <?php echo e(csrf_field()); ?>


                                    <div class="btn-group btn-group-xs pull-right" role="group">
                                        <a href="<?php echo e(route('asset_categories.asset_category.show', $assetCategory->id )); ?>" class="btn btn-info" title="Show Asset Category">View
                                            <span class="glyphicon glyphicon-open" aria-hidden="true"></span>
                                        </a>
                                        <a href="<?php echo e(route('asset_categories.asset_category.edit', $assetCategory->id )); ?>" class="btn btn-primary" title="Edit Asset Category">Edit
                                            <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        </a>

                                        <button type="submit" class="btn btn-danger" title="Delete Asset Category" onclick="return confirm(&quot;Delete Asset Category?&quot;)">Delete
                                            <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        </button>
                                    </div>

                                </form>
                                
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="panel-footer">
            
            <?php echo e($assetCategories->links('vendor.pagination.bootstrap-4')); ?>

        </div>
        
        <?php endif; ?>
    
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.default', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>