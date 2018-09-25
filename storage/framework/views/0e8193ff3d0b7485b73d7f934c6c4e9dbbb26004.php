

<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('content'); ?>

<div class="content">
    <div class="courses item-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex section_title_container">
                        <h2 class="mr-auto p-2 section_title"><?php echo e($title); ?></h2>
                        <form method="post" class="d-flex flex-row align-items-center justify-content-center" action="<?php echo e(route('filesection')); ?>">
                          <?php echo e(csrf_field()); ?>

                          <input type="hidden" name="section" value="courses">
                            <select name="catagory_id" class="p-2 dropdown_item_select custom-select" required>
                                  <option value="0">All Category</option>
                                  <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catagory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($catagory->id); ?>"><?php echo e($catagory->catagory_name); ?></option>
                                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                            <input type="submit" class="p-2 btn section_button" value="Refresh">
                        </form>
                    </div>
                </div>
            </div>

            <div class="row courses_row">
                <?php if(count($courses)): ?>
                  <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 course_col">
                        <div class="course"><a href="<?php echo e(asset('courses/preview/'.$course->id)); ?>">
                            <div class="course_image">
                                <img src="<?php echo e(asset('/storage/thumbnail/course/'.$course->thumbnail)); ?>" alt="">
                                </div>
                            <div class="course_body">
                                <h4 class="course_title"><?php echo e($course->title); ?></h4>
                                                
                                <div class="course_teacher"><?php echo e($course->author); ?></div>
                                
                                <div class="course_text">
                                    <p><?php echo e($course->description); ?></p>
                                </div>

                                <div class="d-flex course-footer">
                                    <div class="mr-auto p-2">
                                    <i class="fa fa-clock-o"></i> <?php echo e($course->duration); ?> Hour</div>
                                    <div class="p-2 course_price">
                                    <i class="fa fa-dollar"></i>
                                        <?php if($course->course_fee>0): ?>
                                            <?php echo e($course->course_fee); ?>  
                                        <?php else: ?>
                                            Free
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    </div>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php else: ?>
                  <h3 class="pagination">Sorry, no course found</h3>
                <?php endif; ?>
            </div>
            <div class="pagination"><?php echo e($courses->render()); ?></div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>