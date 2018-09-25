<?php $__env->startSection('title', "Author"); ?>

<?php $__env->startSection('content_title', $title); ?>

<?php $__env->startSection('content'); ?>
   <div class="col-md-9">
    	<form class="panel-body" method="POST" action="<?php echo e(route('searchauthor')); ?>">
            <?php echo e(csrf_field()); ?>


             <?php if(count($errors) > 0): ?>
                <p class="bg-danger text-white text-center">
                      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($error); ?>

                        <br>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
              <?php endif; ?>

            <div class="form-inline d-flex justify-content-center">
                <input type="text" class="form-control mr-sm-1" placeholder="Enter Author Name" id="author_name" name="author_name" required autofocus style="width: 300px;" />
                <input type="submit" value="Search" class="btn btn-primary">
            </div>
        </form>
	  <?php $__currentLoopData = $authors; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $author): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	  		<?php
	  			$auhtorLink="/author/".$author->id;
	  		?>
	  		<div class="" style="padding: 5px; margin-bottom: 5px; background: #efefef">
		        <h4><a href=<?php echo e($auhtorLink); ?>><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a></h4>
		        <?php echo e($author->email); ?>

	    	</div>
	  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

	  <div class="text-center"><?php echo e($authors->links()); ?></div>
	</div>
	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>