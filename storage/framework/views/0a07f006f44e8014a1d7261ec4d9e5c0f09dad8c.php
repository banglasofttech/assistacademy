<?php $__env->startSection('title', "Manage Course"); ?>

<?php $__env->startSection('content_title', "Manage Course"); ?>

<?php $__env->startSection('content'); ?>

      <table class="table table-striped ">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <?php if(Auth::user()->user_type=="admin"): ?>
              <th scope="col">Trainer</th>
            <?php endif; ?>
            <th scope="col">Duration</th>
            <th scope="col">Views</th>
            <th scope="col">Users</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $courses; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $course): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td style="word-wrap: break-word;">
                <a href="/courses/view/<?php echo e($course->id); ?>"><?php echo e($course->title); ?></a>
              </td>
              <td><?php echo e($course->catagory_id); ?></td>

              <?php if(Auth::user()->user_type=="admin"): ?>
                <td><a href="/author/<?php echo e($course->user_id); ?>"><?php echo e($course->author); ?> </a></td>
              <?php endif; ?>

              <td><?php echo e($course->duration); ?> <?php echo e($course->duration_type); ?></td>
              <td><?php echo e($course->total_view); ?></td>             
              <td><?php echo e($course->users); ?></td>          
              <td>
                <a href="/managefiles/courses/edit/<?php echo e($course->id); ?>" class="btn btn-success btn-sm">Edit</a>
                <a href="/managefiles/courses/remove/<?php echo e($course->id); ?>" class="btn btn-danger btn-sm" id="remove_file_button">Remove</a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <div class="text-center"><?php echo e($courses->links()); ?></div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>