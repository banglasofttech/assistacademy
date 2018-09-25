<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/course.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/review.css')); ?>">
  
  <div class="course">
    <div class="container">
      <div class="row">
        <!-- Course -->
        <div class="col-lg-8">
          <div class="course_container">
            <div class="course_title"><?php echo e($title); ?></div>

            <div class="course_tabs_container">
              <!-- Comments -->
              <div class="tab_panel tab_panel_2 active">
                <div class="tab_panel_content">
                  <div class="tab_panel_title">Comments (<?php echo e($total_comment); ?>)</div>
                  <hr>
                  <div class="tab_panel_content">
                      <?php $i =0 ?>
                      <?php $__currentLoopData = $all_comment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="review-block">
                            <div class="row">
                              <div class="col-sm-3">
                                <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                                <div class="review-block-name"> <?php echo e($commented_users[$i]->first_name); ?> <?php echo e($commented_users[$i]->last_name); ?></div>
                                <div class="review-block-date"> <?php echo e($comment->created_at); ?></div>
                              </div>
                              <div class="col-sm-9">
                                <div class="review-block-description"><?php echo e($comment->comment); ?></div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <?php $i++ ?>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    <div class="pagination"><?php echo e($all_comment->render()); ?></div>
                      
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script src="<?php echo e(asset('content/js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('content/js/course.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>