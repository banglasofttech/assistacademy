

<?php $__env->startSection('title', $title." - Videos"); ?>

<?php $__env->startSection('content_title', $title); ?>

<?php $__env->startSection('content'); ?>
<div class="">

  <div class="item-panel bg-warning d-flex">
    <div class="mr-auto p-2">
      <font style="font-size: 25px; text-transform: uppercase;"><?php echo e($title); ?> <sub class="text-capitalize">(videos)</sub></font>
    </div>
    <div class="p-2 align-middle">
      <form method="POST"  class=" " action="<?php echo e(route('search')); ?>" enctype="multipart/form-data">
          <?php echo e(csrf_field()); ?>

          <input type="hidden" name="file_type" value="video">
          <input  type="name" class="flipkart-navbar-input" placeholder="Search videos" id="file_name" name="file_name">
          <button type="submit" class="flipkart-navbar-button">
              <svg width="20px" height="15px">
                  <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
              </svg>
          </button>
        </form>
    </div>
  </div>

  <?php if($videos[0]): ?>
  <div class="row">
  <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-2.5">
          <?php
            $image='/storage/thumbnail/videos/'.$video->thumbnail;
            $videoLink='/videos/view/'.$video->id;
          ?>
          <div class="content-list">
            <a href=<?php echo e($videoLink); ?> class="panel-heading">
              <div class="content-name"><?php echo e($video->file_name); ?></div>
              <div class="content-fee">( <?php echo e($video->Fee); ?> )</div>
              <div class="content-author"><?php echo e($video->author); ?></div>
              <img src="<?php echo e(asset($image)); ?>" width="160px" height="150px">
            </a>
          </div>
        </div>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>
  <div class="text-center"><?php echo e($videos->links()); ?></div>
  <?php else: ?>
  <h2 class="text-center">Sorry, no video found</h2>
  <?php endif; ?>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>