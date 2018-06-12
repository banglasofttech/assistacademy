<?php $__env->startSection('title',$title); ?>

<?php $__env->startSection('content'); ?>
<div class="">

  <div class="item-panel bg-warning d-flex">
    <div class="mr-auto p-2">
      <font style="font-size: 25px;">Search Results for "<?php echo e($title); ?>"</font>
    </div>
  </div>

  <form method="POST"  class=" " action="<?php echo e(route('search')); ?>" enctype="multipart/form-data">
    <?php echo e(csrf_field()); ?>

    <input type="hidden" id="search_file_type" name="file_type" value="book">
    <input  type="hidden" class="flipkart-navbar-input" id="file_name" name="file_name" value="<?php echo e($title); ?>">
  
    <div class="row d-flex justify-content-around">
      <div class="col-md-2.5">
        <div class="content-list">
          <button type="submit" class="panel-heading book-search">
            <div class="content-author"><h2>Books</h2></div>
            <div class="content-name"><h3><?php echo e($total_books); ?></h3></div>
          </button>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <button type="submit" class="panel-heading ppt-search">
            <div class="content-author"><h2>PPTs</h2></div>
            <div class="content-name"><h3><?php echo e($total_ppts); ?></h3></div>
          </button>
        </div>
      </div>


      <div class="col-md-2.5">
        <div class="content-list">
          <button type="submit" class="panel-heading training-search">
            <div class="content-author"><h2>Training</h2></div>
            <div class="content-name"><h3><?php echo e($total_videos); ?></h3></div>
          </button>
        </div>
      </div> 

      <div class="col-md-2.5">
        <div class="content-list">
          <button type="submit" class="panel-heading course-search">
            <div class="content-author"><h2>Courses</h2></div>
            <div class="content-name"><h3>0</h3></div>
          </button>
        </div>
      </div> 

      <div class="col-md-2.5">
        <div class="content-list">
          <button type="submit" class="panel-heading journal-search">
            <div class="content-author"><h2>Journal</h2></div>
            <div class="content-name"><h3>0</h3></div>
          </button>
        </div>
      </div>
    </div>

  </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>