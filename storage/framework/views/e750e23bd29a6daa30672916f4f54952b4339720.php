<?php $__env->startSection('content'); ?>



<!-- ////////////////////////////////////////////////////////////////////////////-->
    <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1 box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 px-2 py-2 m-0">
            <div class="card-header no-border pb-0">
                <div class="card-title text-xs-center">
                    <img src="<?php echo e(asset('app-assets/images/logo/robust-logo-dark.png')); ?>" alt="branding logo">
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>We will send you a link to reset your password.</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">

                    <?php if(session('status')): ?>
                        <div class="alert alert-success">
                            <?php echo e(session('status')); ?>

                        </div>
                    <?php endif; ?>

                    <form class="form-horizontal" method="POST" action="<?php echo e(route('password.email')); ?>">

                        <?php echo e(csrf_field()); ?>


                        <fieldset class="form-group position-relative has-icon-left">
                            <input type="email" class="form-control form-control-lg input-lg<?php echo e($errors->has('email') ? ' has-error' : ''); ?>" id="user-email" name="email" placeholder="Your Email Address" value="<?php echo e(old('email')); ?>" required>
                            <div class="form-control-position">
                                <i class="icon-mail6"></i>
                            </div>
                                <?php if($errors->has('email')): ?>
                                    <span class="alert alert-info">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                        </fieldset>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-lock4"></i> Recover Password</button>
                    </form>
                </div>
            </div>
            <div class="card-footer no-border">
                <p class="float-sm-left text-xs-center"><a href="<?php echo e(url('login')); ?>" class="card-link">Login</a></p>
                <p class="float-sm-right text-xs-center">New to Robust ? <a href="<?php echo e(url('register')); ?>" class="card-link">Create Account</a></p>
            </div>
        </div>
    </div>
</section>

        </div>
      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>