<?php $__env->startSection('content'); ?>
 <div class="app-content content container-fluid">
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="p-1"><img src="<?php echo e(asset('app-assets/images/logo/robust-logo-dark.png')); ?>" alt="branding logo"></div>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login with Robust</span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                     <form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>


                        <fieldset class="form-group position-relative has-icon-left mb-0<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                            <input type="email" class="form-control form-control-lg input-lg" id="email" name="email" placeholder="Enter E-Mail" name="email" value="<?php echo e(old('email')); ?>" required autofocus>
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>

                             <?php if($errors->has('email')): ?>
                                   
                                    <span class="btn btn-outline-danger no-border danger.lighten-4">
                                       <div class="row"> <strong><?php echo e($errors->first('email')); ?></strong> </div>
                                    </span>
                                  
                                <?php endif; ?>

                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                            <input type="password" class="form-control form-control-lg input-lg" id="password" name="password" placeholder="Enter Password" required>
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                            
                                 <?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>

                        </fieldset>
                        <fieldset class="form-group row">
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                <fieldset>
                                    <input type="checkbox" id="remember-me" name="remember" <?php echo e(old('remember') ? 'checked' : ''); ?>  class="chk-remember">
                                    <label for="remember-me"> Remember Me</label>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="<?php echo e(route('password.request')); ?>" class="card-link">Forgot Password?</a></div>
                        </fieldset>
                        <button type="submit" name="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <p class="float-sm-left text-xs-center m-0"><a href="<?php echo e(route('password.request')); ?>" class="card-link">Recover password</a></p>
                    <p class="float-sm-right text-xs-center m-0">New to Robust? <a href="<?php echo e(url('register')); ?>" class="card-link">Sign Up</a></p>
                </div>
            </div>
        </div>
     </div>
   </section>
  </div>
 </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.login_header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>