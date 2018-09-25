<?php $__env->startSection('title',"Login"); ?>

<?php $__env->startSection('content'); ?>

<div class="content">
    <div class="courses item-section">
        <div class="container">
		  <div class="modal-dialog modal-dialog-centered">
		    <div class="modal-content">
		      <div class="modal-header">
		        <h4 class="modal-title">Login</h4>
		      </div>
		       <form method="post" action="<?php echo e(route('login')); ?>" role='login'>
		        <div class="modal-body">
		          <?php echo e(csrf_field()); ?>


		          <div class="form-group">
		            <label for="exampleInputEmail1">User Type</label>
		            <h5 class="text-dark">
		              <input type="radio" name="user_type" id="learner" value="general_user" checked style="margin-left: 5px;"> <label for="learner">Leaner</label>
		              <input type="radio" name="user_type" value="author" id="author" style="margin-left: 5px;"> <label for="author">Trainer/Author/Teacher</label>
		              <input type="radio" name="user_type" id="corporate" value="corporate" style="margin-left: 5px;"> <label for="corporate">Corporate User</label>
		            </h5>
		          </div>

		          <div class="form-group">
		            <label for="exampleInputEmail1">Email address</label>
		            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email" required autofocus>
		          </div>

		          <div class="form-group">
		            <label for="exampleInputPassword1">Password</label>
		            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required autofocus>
		          </div>
		        </div>
		        <div class="modal-footer">
		          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#RegistrationModal">Create new Account</button>
		          <input type="submit" class="btn btn-success" value="Login">
		        </div>
		      </form>
		    </div>
		  </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>