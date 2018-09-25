<?php $__env->startSection('title', $title); ?>

<?php $__env->startSection('content'); ?>

<link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/course.css')); ?>">

  <div class="course">
    <div class="container">
      <div class="row">
        <!-- Course -->
        <div class="col-lg-8">
          <div class="course_container">
            <div class="title"><?php echo e($ppt->file_name); ?></div>
            <div class="row content_short_info">

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Uploaded By:</div>
                <div class="course_info_text"><a href="<?php echo e(asset('author/'.$author->id)); ?>"><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a></div>
              </div>

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Uploaded On:</div>
                <div class="course_info_text"><?php echo e($ppt->created_at); ?></div>
              </div>

              <div class="col-lg-3">
                <div class="course_info_title">Views:</div>
                <div class="course_info_text"><?php echo e($ppt->total_view); ?></div>
              </div>

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Category:</div>
                <div class="course_info_text"><a href="<?php echo e(asset('ppts/catagory/'.$ppt->catagory_id)); ?>"> <?php echo e($ppt->catagory_name); ?></a></div>
              </div>

            </div>
          </div>
            <!-- PPT Viewer -->
            <!--<iframe class="ppt_viewer" src="https://drive.google.com/viewerng/viewer?url=https://desinnet.myblog.it/media/00/02/282529104.ppt&hl=en&pid=explorer&efh=false&a=v&chrome=false&embedded=true" width="100%" style="height:560px;" frameborder="0">-->
            <!--</iframe> -->
            
            <iframe class="ppt_viewer" src="https://view.officeapps.live.com/op/embed.aspx?src=<?php echo e(asset('storage/files/ppts/'.$ppt->file)); ?>" width="100%" style="height:560px;" frameborder="0">
            </iframe> 

        </div>          
      
        <!-- Course Sidebar -->
        <div class="col-lg-4">
          <div class="sidebar">
            
              <!-- Author Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Uploaded by</div>
                <div class="sidebar_teacher">
                  <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                    <div class="teacher_image">
                        <img src="<?php echo e(asset('/storage/thumbnail/author/'.$author->pp)); ?>" alt="">
                        </div>
                    <div class="teacher_title">
                      <div class="teacher_name"><a href="<?php echo e(asset('author/'.$author->id)); ?>"><?php echo e($author->first_name); ?> <?php echo e($author->last_name); ?></a></div>
                      <div class="teacher_position"><?php echo e($author->occupation); ?> at <?php echo e($author->organization); ?></div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Related Content Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Related PPTs</div>
                <div class="sidebar_latest">
                  <?php $__currentLoopData = $related_ppts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $related_ppt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="latest d-flex flex-row align-items-start justify-content-start">
                      <div class="latest_image"><div>
                          <img src="<?php echo e(asset('/storage/thumbnail/ppts/'.$related_ppt->thumbnail)); ?>" alt="Icon">
                          </div></div>
                      <div class="latest_content">
                        <div class="latest_title"><a href="<?php echo e(asset('ppts/view/'.$related_ppt->id)); ?>"><?php echo e($related_ppt->file_name); ?></a></div>
                        <div class="course_author"><?php echo e($related_ppt->author); ?></div>
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