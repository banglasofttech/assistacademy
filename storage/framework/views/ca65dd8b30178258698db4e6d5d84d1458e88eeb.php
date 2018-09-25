<link href="<?php echo e(asset('content/css/bootstrap.css')); ?>" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/css/login.css')); ?>">
<script src="<?php echo e(asset('content/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('content/js/jquery.min.js')); ?>"></script>

<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="<?php echo e(route('login')); ?>" role="login">
          <?php echo e(csrf_field()); ?>


          <h1 class="text-primary text-center item-heading">Admin Panel</h1>

          <?php if(count($errors) > 0): ?>
            <p class="bg-danger text-white text-center">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($error); ?>

                    <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
          <?php endif; ?>

          <input type="hidden" id="user_type" name="user_type" value="admin">

          <input type="email" name="email" placeholder="Email" required class="form-control input-lg"/>
          
          <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password" required="" />
          
          
          <div class="pwstrength_viewport_progress"></div>
          
          
          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
          
        </form>
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>      
</div>
