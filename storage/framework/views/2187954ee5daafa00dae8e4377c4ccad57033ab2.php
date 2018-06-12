<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content_title', $title); ?>

<?php $__env->startSection('content'); ?>
  <?php
    $image='/storage/thumbnail/books/'.$book->thumbnail;
    $file='/storage/files/books/'.$book->file;
    $authorLink='/author/'.$author->id;
    $downloadLink='/books/download/'.$book->id;
  ?>

  <div class="row ">
    <div class="col-md-5">
      <!-- Book Info -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px">Book Info</h2>

      <div class="row">
        <div class="col-md-5">
          <img src="<?php echo e(asset($image)); ?>" width="150px" height="180px" style="float: right;">
        </div>
        
        <div class="col-md-7" style="float: left;">
          <span style="font-weight: bold;">Title: </span> <?php echo e($book->file_name); ?>

          <br>
          <span style="font-weight: bold;">Author: </span> <a class="" href=<?php echo e($authorLink); ?>><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a>
          <br>
          <span style="font-weight: bold;">Catagory: </span> <?php echo e($book->catagory_name); ?>

          <br><br>
          <span style="font-weight: bold;">Total Views: </span> <?php echo e($book->total_view); ?>

          <br>
          <span style="font-weight: bold;">Uploaded at: </span> <?php echo e($book->created_at); ?>

          <br>
          <!-- <a href=<?php echo e($downloadLink); ?> class="btn btn-success" role="button">Download Now</a> -->
        </div>
      </div>

      <!-- Related Books -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px; margin-top: 50px;">Related Books</h2>
       <div class="row">
          <?php $__currentLoopData = $related_books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-6">
              <?php
                $image='/storage/thumbnail/books/'.$book->thumbnail;
                $bookLink='/books/view/'.$book->id;
              ?>
              <div class="content-list">
                <a href=<?php echo e($bookLink); ?> class="panel-heading">
                  <div class="content-name"><?php echo e($book->file_name); ?></div>
                  <div class="content-author"><?php echo e($book->author); ?></div>
                  <img src="<?php echo e(asset($image)); ?>" width="160px" height="150px">
                </a>
              </div>
            </div>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
       </div>
    </div>

    <div class="col-md-7">
       <iframe src='http://docs.google.com/gview?embedded=true&url=<?php echo e(asset($file)); ?>' width="100%" style="height:100%;" frameborder="0"></iframe> 
        <!--<iframe name="myiframe"  width="100%" id="myiframe" src="<?php echo e(asset($file)); ?>" style="height: 1000px;">-->
    </div>
  </div>

   

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>