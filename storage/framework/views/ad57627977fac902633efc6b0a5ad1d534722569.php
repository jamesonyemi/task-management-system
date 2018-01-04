<?php $__env->startComponent('mail::message'); ?>

<?php if(! empty($greeting)): ?>
# <?php echo e($greeting); ?>

<?php else: ?>
<?php if($level == 'error'): ?>
# Whoops!
<?php else: ?>

#<?php echo e($greeting = 'New Ticket'); ?>


<?php endif; ?>
<?php endif; ?>


<?php $__currentLoopData = $introLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php echo e($line); ?>

<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if(isset($actionText)): ?>
<?php
    switch ($level) {
        case 'success':
            $color = 'green';
            break;
        case 'error':
            $color = 'red';
            break;
        default:
            $color = 'blue';
    }
?>
<?php endif; ?>


<?php $__currentLoopData = $outroLines; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $line): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

<?php echo e($line); ?>


<?php echo e($line); ?> 


<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php if(! empty($salutation)): ?>
<?php echo e($salutation); ?>

<?php else: ?>

<?php echo e('A new task has been assigned to you.  '); ?>


<?php $__env->startComponent('mail::header', ['url' => url(route('tickets.tickets.index',Auth::user()->id, false))]); ?>
<?php echo e('Please click Here'); ?>

<?php echo $__env->renderComponent(); ?>


<?php endif; ?>


<?php if(isset($actionText)): ?>
<?php $__env->startComponent('mail::subcopy'); ?>
If you’re having trouble clicking the "<?php echo e($actionText); ?>" button, copy and paste the URL below
into your web browser: [<?php echo e($actionUrl); ?>](<?php echo e($actionUrl); ?>)
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php echo $__env->renderComponent(); ?>

