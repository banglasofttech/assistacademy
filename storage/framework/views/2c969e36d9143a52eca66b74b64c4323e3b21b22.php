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

                          <input type="hidden" name="section" value="training">
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
                <?php if(count($trainings)): ?>
                  <?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-3 course_col">
                        <div class="course"><a href="<?php echo e(asset('training/preview/'.$training->id)); ?>">
                            <div class="course_image">
                                <img src="<?php echo e(asset('/storage/thumbnail/training/'.$training->thumbnail)); ?>" alt="">
                                </div>
                            <div class="course_body">
                                <h4 class="course_title"><?php echo e($training->title); ?></h4>
                                                
                                <div class="course_teacher"><?php echo e($training->author); ?></div>

                                <div class="d-flex course-footer">
                                    <div class="mr-auto p-2">
                                    <i class="fa fa-clock-o"></i> <?php echo e($training->duration); ?> <?php echo e($training->duration_type); ?></div>
                                    <div class="p-2 course_price">
                                    <i class="fa fa-dollar"></i>
                                        <?php if($training->fee>0): ?>
                                            <?php echo e($training->fee); ?>  
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
                  <h3 class="pagination">Sorry, no training found</h3>
                <?php endif; ?>
            </div>
            <div class="pagination"><?php echo e($trainings->render()); ?></div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>