<?php $__env->startSection('title', $training->title); ?>

<?php $__env->startSection('content'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/course.css')); ?>">
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/review.css')); ?>">

  <div class="course">
    <div class="container">
      <div class="row">
        <!-- Course -->
        <div class="col-lg-8">
          <div class="course_container">
            <div class="title"><?php echo e($training->title); ?></div>

            <div class="row content_short_info">

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Trainer:</div>
                <div class="course_info_text"><a href="<?php echo e(asset('author/'.$author->id)); ?>"><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a></div>
              </div>

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Duration:</div>
                <div class="course_info_text"><?php echo e($training->duration); ?> <?php echo e($training->duration_type); ?></div>
              </div>

              <div class="col-lg-3">
                <div class="course_info_title">Fee:</div>
                <div class="course_info_text">
                  <?php if($training->fee>0): ?>
                    $<?php echo e($training->fee); ?>

                  <?php else: ?>
                    Free
                  <?php endif; ?>
                </div>
              </div>

              <!-- Training Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Rating:</div>
                <div class="course_info_text"><h4><?php echo e(sprintf('%0.1f',$avg_rating)); ?> / <small>5</small></h4></div>
              </div>

            </div>

            <!-- Course Tabs -->
            <div class="course_tabs_container">
              
              <div class="tab_panels" style="width: 100%">

                <!-- Description -->
                <div class="tab_panel active">
                  <div class="tab_panel_title">Introduction</div>
                  <div class="tab_panel_content">
                    <div class="tab_panel_text">
                      <p><?php echo e($training->introduction_text); ?></p>
                    </div>

                    <div class="tab_panel_section">
                      <div class="tab_panel_title">Objective</div>
                      <ul class="tab_panel_bullets">
                        <?php $__currentLoopData = $objectives; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $objective): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <?php if($objective): ?>
                            <li><?php echo e($objective); ?></li>
                          <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4">
          <div class="sidebar" style="padding-top: 15px;">

              <!-- Related Content Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Short Description</div>
                <div class="sidebar_latest">
                  <?php if($file_ext=='mp4'): ?>
                      <video class="blog_post_video video-js" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": ""}'>
                        <source src="<?php echo e(asset('/storage/files/training/introduction_files/'.$training->introduction_file)); ?>" type="video/mp4">
                        Your browser does not support HTML5 video.
                      </video>
                    <?php elseif($file_ext=='pdf'): ?>
                        <iframe class="pdf_viewer" src="http://docs.google.com/gview?embedded=true&url=<?php echo e(asset('/storage/files/training/introduction_files/'.$training->introduction_file)); ?>" width="100%" style="height:250px;" frameborder="0">
                        </iframe> 
                    <?php elseif($file_ext=='ppt'): ?>
                        <iframe class="ppt_viewer" src="https://view.officeapps.live.com/op/embed.aspx?src=<?php echo e(asset('/storage/files/training/introduction_files/'.$training->introduction_file)); ?>" width="100%" style="height:250px;" frameborder="0">
                        </iframe>
                    <?php endif; ?>

                    <a class="btn btn-success btn-block" href="<?php echo e(asset('training/view/'.$training->id )); ?>" style="font-size: 20px; font-weight: bold;margin-top: 5px;">Get it Now</a>
                </div>
              </div>

              <!-- Feature -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Trainer</div>
                <div class="sidebar_teacher">
                  <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                    <div class="teacher_image">
                        <!-- <img src="<?php echo e(asset('/storage/thumbnail/author/'.$author->pp)); ?>" alt=""> -->
                        <img src="<?php echo e(asset('/storage/thumbnail/author/'.$author->pp)); ?>" alt="">
                        </div>
                    <div class="teacher_title">
                      <div class="teacher_name"><a href="<?php echo e(asset('author/'.$author->id)); ?>"><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a></div>
                      <div class="teacher_position"><?php echo e($author->occupation); ?> at <?php echo e($author->organization); ?></div>
                    </div>
                  </div>
                  <div class="teacher_info">
                    <p><?php echo e($training->trainer_description); ?></p>
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
<script src="<?php echo e(asset('content/js/review.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>