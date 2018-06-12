<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content_title', $title); ?>

<?php $__env->startSection('content'); ?>
  
  <div class="row">
    <div class="col-md-5">
      <h2 class="item-panel text-center text-primary" style="padding: 5px">Personal Info</h2>
      <div class="row">
        <div class="col-md-5">
          <img src="<?php echo e(asset('content/images/author.png')); ?>" width="150px" height="150px" style="float: right;">
        </div>
        
        <div class="col-md-7" style="float: left;">
          <span style="font-weight: bold;">Name: </span> <?php echo e($title); ?>

          <br>
          <span style="font-weight: bold;">Email: </span> <?php echo e($author->email); ?>

          <br>
          <span style="font-weight: bold;">Joined: </span> <?php echo e($author->created_at); ?>

          <br><br>
          <span style="font-weight: bold;">Total Uploaded Books: </span> <?php echo e($books); ?>

          <br>
          <span style="font-weight: bold;">Total Uploaded Videos: </span> <?php echo e($videos); ?>

          <br>
          <span style="font-weight: bold;">Total Uploaded PPTs: </span> <?php echo e($ppts); ?>

        </div>
      </div>
    </div>
    
    <div class="col-md-7">
      <h2 class="item-panel text-center text-primary" style="padding: 5px">Uploaded Files</h2>

      <div class="row">
        <div class="col-md-4">
          <div class="content-list">
            <a href="/books/author/<?php echo e($author->email); ?>">
              <img src="<?php echo e(asset("content/images/book.png")); ?>" width="120px" height="120px">
              <div class="content-title">Books</div>
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="content-list">
            <a href="/ppts/author/<?php echo e($author->email); ?>">
              <img src="<?php echo e(asset("content/images/ppt.png")); ?>" width="120px" height="120px">
              <div class="content-title">PPTs</div>
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="content-list">
            <a href="/videos/author/<?php echo e($author->email); ?>">
              <img src="<?php echo e(asset("content/images/video.png")); ?>" width="120px" height="120px">
              <div class="content-title">Training</div>
            </a>
          </div>
        </div>

      </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>