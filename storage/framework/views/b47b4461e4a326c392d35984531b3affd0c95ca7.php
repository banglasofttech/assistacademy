<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/course.css')); ?>">

  <div class="course">
    <div class="container">
      <div class="row">
        <!-- Course -->
        <div class="col-lg-8">
          <div class="course_container">
            <div class="course_title"><?php echo e($training->title); ?></div>
            <div class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

              <!-- Course Info Item -->
              <div class="course_info_item">
                <div class="course_info_title">Trainer:</div>
                <div class="course_info_text"><a href="<?php echo e(asset('training/author/'.$training->uploader_email)); ?>"><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a></div>
              </div>

              <!-- Course Info Item -->
              <div class="course_info_item">
                <div class="course_info_title">Uploaded On:</div>
                <div class="course_info_text"><?php echo e($training->created_at); ?></div>
              </div>

              <div class="course_info_item">
                <div class="course_info_title">Fee:</div>
                <div class="course_info_text">
                  <?php if($training->fee>0): ?>
                    $<?php echo e($training->fee); ?>

                  <?php else: ?>
                    Free
                  <?php endif; ?>
                </div>
              </div>

              <!-- Course Info Item -->
              <div class="course_info_item">
                <div class="course_info_title">Category:</div>
                <div class="course_info_text"><a href="<?php echo e(asset('training/catagory/'.$training->catagory_id)); ?>"> <?php echo e($training->catagory_name); ?></a></div>
              </div>

            </div>
          </div>

            <!-- training Player -->
           <video class="blog_post_video video-js" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": "<?php echo e(asset('/storage/thumbnail/training/'.$training->thumbnail)); ?>"}'>
              <source src="<?php echo e(asset('/storage/files/training/'.$training->file)); ?>" type="video/mp4">
              Your browser does not support HTML5 training.
            </video>

            <div class="tab_panel_section">
              <div class="tab_panel_title">Description</div>
              <div class="tab_panel_text">
                <p><?php echo e($training->description); ?></p>
              </div>
            </div>

          </div>          
      
        <!-- Course Sidebar -->
        <div class="col-lg-4">
          <div class="sidebar">
            
              <!-- Author Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Trainer</div>
                <div class="sidebar_teacher">
                  <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                    <div class="teacher_image">
                        <img src="<?php echo e(asset('/storage/thumbnail/author/'.$author->pp)); ?>" alt="">
                        </div>
                    <div class="teacher_title">
                      <div class="teacher_name"><a href="<?php echo e(asset('training/author/'.$training->uploader_email)); ?>"><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a></div>
                      <div class="teacher_position"><?php echo e($author->occupation); ?> at <?php echo e($author->organization); ?></div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Related Content Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Related Trainings</div>
                <div class="sidebar_latest">
                  <?php $__currentLoopData = $related_trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="latest d-flex flex-row align-items-start justify-content-start">
                      <div class="latest_image"><div><img src="<?php echo e(asset('/storage/thumbnail/training/'.$related_training->thumbnail)); ?>" alt="Icon"></div></div>
                      <div class="latest_content">
                        <div class="latest_title"><a href="<?php echo e(asset('training/view/'.$related_training->id)); ?>"><?php echo e($related_training->title); ?></a></div>
                        <div class="course_author">
                          <?php if($related_training->fee>0): ?>
                            $<?php echo e($related_training->fee); ?>

                          <?php else: ?>
                            Free
                          <?php endif; ?>
                        </div>
                      </div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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