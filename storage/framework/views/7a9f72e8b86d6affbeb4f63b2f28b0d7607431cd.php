<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content_title', $title); ?>

<?php $__env->startSection('content'); ?>
  <?php
    $image='/storage/thumbnail/videos/'.$video->thumbnail;
    $file='/storage/files/videos/'.$video->file;
    $authorLink='/author/'.$author->id;
    $downloadLink='/videos/download/'.$video->id;
  ?>

  <div class="row ">
    <div class="col-md-5">
      <!-- video Info -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px">Video Info</h2>

      <div class="row">
        <div class="col-md-5">
          <img src="<?php echo e(asset($image)); ?>" width="150px" height="180px" style="float: right;">
        </div>
        
        <div class="col-md-7" style="float: left;">
          <span style="font-weight: bold;">Title: </span> <?php echo e($video->file_name); ?>

          <br>
          <span style="font-weight: bold;">Author: </span> <a class="" href=<?php echo e($authorLink); ?>><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a>
          <br>
          <span style="font-weight: bold;">Catagory: </span> <?php echo e($video->catagory_name); ?>

          <br><br>
          <span style="font-weight: bold;">Fee: </span> <?php echo e($video->Fee); ?>

          <br>
          <span style="font-weight: bold;">Total Views: </span> <?php echo e($video->total_view); ?>

          <br>
          <span style="font-weight: bold;">Uploaded at: </span> <?php echo e($video->created_at); ?>

          <br>
          <!-- <a href=<?php echo e($downloadLink); ?> class="btn btn-success" role="button">Download Now</a> -->
        </div>
      </div>

      <!-- Related videos -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px; margin-top: 50px;">Related Videos</h2>
       <div class="row">
          <?php $__currentLoopData = $related_videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6">
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
    </div>

    <div class="col-md-7">
      <video width="100%" height="500px" controls>
        <source src="<?php echo e(asset($file)); ?>" type="video/mp4">
      </video>
    </div>
  </div>

   

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>