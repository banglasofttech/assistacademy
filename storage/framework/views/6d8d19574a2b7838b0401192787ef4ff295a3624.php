<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content_title', $title); ?>

<?php $__env->startSection('content'); ?>
  <?php
    $image='/storage/thumbnail/ppts/'.$ppt->thumbnail;
    $file='/storage/files/ppts/'.$ppt->file;
    $authorLink='/author/'.$author->id;
    $downloadLink='/ppts/download/'.$ppt->id;
  ?>

  <div class="row ">
    <div class="col-md-5">
      <!-- ppt Info -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px">PPT Info</h2>

      <div class="row">
        <div class="col-md-5">
          <img src="<?php echo e(asset($image)); ?>" width="150px" height="180px" style="float: right;">
        </div>
        
        <div class="col-md-7" style="float: left;">
          <span style="font-weight: bold;">Title: </span> <?php echo e($ppt->file_name); ?>

          <br>
          <span style="font-weight: bold;">Author: </span> <a class="" href=<?php echo e($authorLink); ?>><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a>
          <br>
          <span style="font-weight: bold;">Catagory: </span> <?php echo e($ppt->catagory_name); ?>

          <br><br>
          <span style="font-weight: bold;">Total Views: </span> <?php echo e($ppt->total_view); ?>

          <br>
          <span style="font-weight: bold;">Uploaded at: </span> <?php echo e($ppt->created_at); ?>

          <br>
          <!-- <a href=<?php echo e($downloadLink); ?> class="btn btn-success" role="button">Download Now</a> -->
        </div>
      </div>

      <!-- Related ppts -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px; margin-top: 50px;">Related PPTs</h2>
       <div class="row">
          <?php $__currentLoopData = $related_ppts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ppt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6">
              <?php
                $image='/storage/thumbnail/ppts/'.$ppt->thumbnail;
                $pptLink='/ppts/view/'.$ppt->id;
              ?>
              <div class="content-list">
                <a href=<?php echo e($pptLink); ?> class="panel-heading">
                  <div class="content-name"><?php echo e($ppt->file_name); ?></div>
                  <div class="content-author"><?php echo e($ppt->author); ?></div>
                  <img src="<?php echo e(asset($image)); ?>" width="160px" height="150px">
                </a>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
    </div>

    <div class="col-md-7">
      <iframe src='http://docs.google.com/gview?embedded=true&url=<?php echo e(asset($file)); ?>' width="100%" style="height:650px;" frameborder="0"></iframe>
    </div>
  </div>

   

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>