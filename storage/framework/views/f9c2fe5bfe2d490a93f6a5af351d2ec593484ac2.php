<?php $__env->startSection('title', "Manage Course"); ?>

<?php $__env->startSection('content_title', "Manage Course"); ?>

<?php $__env->startSection('content'); ?>

      <table class="table table-striped ">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Trainer</th>
            <th scope="col">Duration</th>
            <th scope="col">Views</th>
            <th scope="col">Users</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <input type="hidden"  id="content_id" value="<?php echo e($course->id); ?>" >
              <td style="word-wrap: break-word;"><?php echo e($course->title); ?></td>
              <td style="word-wrap: break-word;"><?php echo e($course->trainer_description); ?></td>
              <td><?php echo e($course->duration); ?></td>
              <td><?php echo e($course->total_view); ?></td>             
              <td><?php echo e($course->users); ?></td>             
              <td>
                <a href="/courses/view/<?php echo e($course->id); ?>" class="btn btn-success" id="view_course_button">View</a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <div class="text-center"><?php echo e($courses->links()); ?></div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>