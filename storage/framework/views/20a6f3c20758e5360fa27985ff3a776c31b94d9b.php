

<?php $__env->startSection('title', $course->title); ?>

<?php $__env->startSection('content_title', $course->title); ?>

<?php $__env->startSection('content'); ?>
  <?php
    
  ?>

  <div class="row ">
    <div class="col-md-10 mx-auto">

      <!-- Title and Trainer info -->
      <div align="center">
        <h2><?php echo e($course->title); ?></h2>
        <h6 class="font-italic"><?php echo e($course->trainer_description); ?></h6>
      </div>

      <br><br>

      <table class="table table-bordered">
        <tbody>
          <tr>
            <th>Duration:</th>
            <td><?php echo e($course->duration); ?> days</td>
          </tr>

          <tr>
            <th>Description:</th>
            <td><?php echo e($course->description); ?></td>
          </tr>

          <tr>
            <th>Outcome:</th>
            <td><?php echo e($course->outcome); ?></td>
          </tr>

          <tr>
            <th>Introduction:</th>
            <td>
              <?php echo e($course->introduction_text); ?>


              <?php if($course->introduction_file): ?>
                <br><br>
                <video width="80%" height="350px" controls>
                  <source src="/storage/files/courses/<?php echo e($course->introduction_file); ?>" type="video/mp4">
                </video>
              <?php endif; ?>
            </td>
          </tr>

          <tr>
            <th>Books:</th>
            <td>
              Links:<br>
              <?php $__currentLoopData = $book_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($book_link); ?>"><?php echo e($book_link); ?></a><br>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              Files:<br>
              <?php $__currentLoopData = $book_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/storage/files/books/<?php echo e($book_file); ?>"><?php echo e($book_file); ?></a><br>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
          </tr>

          <tr>
            <th>PPTs:</th>
            <td>
              Links:<br>
              <?php $__currentLoopData = $ppt_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ppt_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($ppt_link); ?>"><?php echo e($ppt_link); ?></a><br>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              Files:<br>
              <?php $__currentLoopData = $ppt_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ppt_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/storage/files/ppts/<?php echo e($ppt_file); ?>"><?php echo e($ppt_file); ?></a><br>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
          </tr>

          <tr>
            <th>Videos:</th>
            <td>
              Links:<br>
              <?php $__currentLoopData = $video_links; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video_link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e($video_link); ?>"><?php echo e($video_link); ?></a><br>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

              Files:<br>
              <?php $__currentLoopData = $video_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/storage/files/videos/<?php echo e($video_file); ?>"><?php echo e($video_file); ?></a><br>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
          </tr>

          <tr>
            <th>Exam Questions:</th>
            <td>
              <?php $__currentLoopData = $exam_files; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $exam_file): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="/storage/files/books/<?php echo e($exam_file); ?>"><?php echo e($exam_file); ?></a><br>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </td>
          </tr>

          <tr>
            <td colspan="2" align="center" class="font-weight-bold">Instructions:</td>
          </tr>

          <?php for($i=1;$i<=$duration;$i++): ?>
            <tr>
              <th>Day <?php echo e($i); ?></th>
              <td><p><?php echo e($instructions[$i-1]); ?></p></td>
            </tr>
          <?php endfor; ?>

        </tbody>
      </table>

    </div>
  </div>

   

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>