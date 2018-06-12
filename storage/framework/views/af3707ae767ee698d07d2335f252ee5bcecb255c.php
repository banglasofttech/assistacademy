<?php $__env->startSection('title', "Login"); ?>

<!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/login.css')); ?>"> -->
<!-- <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/bootstrap.min.css')); ?>"> -->

<?php $__env->startSection('content'); ?> 

<div class="row">
<div class="col-md-4"></div>
    <div class="col-md-4 item-panel">
        <h1 class="text-uppercase text-center item-heading">Login</h1>
      <button type="button" class="btn btn-primary btn-block author-login" id="author-login"  data-toggle="modal" data-target="#LoginModal">Login as Trainer/Author/Teacher</button>
      <button type="button" class="btn btn-success btn-block learner-login" data-toggle="modal" data-target="#LoginModal">Login as Learner</button>
      <button type="button" class="btn btn-info btn-block corporate-login" data-toggle="modal" data-target="#LoginModal">Login as Corporate</button>
      <button type="button" class="btn btn-success btn-block"  data-toggle="modal" data-target="#RegistrationModal">Create New Account</button>
  </div>
</div>
  
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>