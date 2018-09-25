



<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('content'); ?>

<div class="content">
    <div class="courses item-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex section_title_container">
                        <h2 class="section_title">Search Results for "<?php echo e($title); ?>"</h2>
                    </div>
                </div>
            </div>

            <form method="POST"  class=" " action="<?php echo e(route('search')); ?>" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" id="search_file_type" name="file_type" value="book">

    <input  type="hidden" class="flipkart-navbar-input" id="file_name" name="file_name" value="<?php echo e($title); ?>">
  
    <div class="row d-flex justify-content-around">
      <div class="col-md-2_5">
        <div class="content-list">
          <button type="submit" class="panel-heading book-search">
             <h3 class="section">Books</h3>
            <h3 class="search-result"><?php echo e($total_books); ?></h3>
        </div>
      </div>

      <div class="col-md-2_5">
        <div class="content-list">
          <button type="submit" class="panel-heading ppt-search">
             <h3 class="section">PPTs</h3>
            <h3 class="search-result"><?php echo e($total_ppts); ?></h3>
          </button>
        </div>
      </div>


      <div class="col-md-2_5">
        <div class="content-list">
          <button type="submit" class="panel-heading video-search">
             <h3 class="section">Videos</h3>
            <h3 class="search-result"><?php echo e($total_videos); ?></h3>
          </button>
        </div>
      </div> 

      <div class="col-md-2_5">
        <div class="content-list">
          <button type="submit" class="panel-heading course-search">
             <h3 class="section">Courses</h3>
            <h3 class="search-result"><?php echo e($total_courses); ?></h3>
          </button>
        </div>
      </div> 

      <div class="col-md-2_5">
        <div class="content-list">
          <button type="submit" class="panel-heading training-search">
            <h3 class="section">Trainings</h3>
            <h3 class="search-result"><?php echo e($total_trainings); ?></h3>
          </button>
        </div>
      </div>
    </div>

  </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>