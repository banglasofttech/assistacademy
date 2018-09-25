

<?php $__env->startSection('title', "Manage Trainings"); ?>

<?php $__env->startSection('content_title', "Manage Trainings"); ?>

<?php $__env->startSection('content'); ?>

      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Views</th>
            <th scope="col">Users</th>
            <th scope="col">
              <?php if(Auth::user()->user_type=="author"): ?>
                Added At
              <?php else: ?>
                Trainer
              <?php endif; ?>
            </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $trainings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $training): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $contentLink='/training/view/'.$training->id;
          ?>
            <tr>
              <input type="hidden"  id="content_id" value="<?php echo e($training->id); ?>" >
              <td><a href=<?php echo e($contentLink); ?>> <?php echo e($training->title); ?></a></td>
              <td><?php echo e($training->catagory_id); ?></td>
              <td><?php echo e($training->total_view); ?></td>
              <td><?php echo e($training->users); ?></td>
              <td>
                <?php if(Auth::user()->user_type=="author"): ?>
                  <?php echo e($training->created_at); ?>

                <?php else: ?>
                  <a href="/author/<?php echo e($training->user_id); ?>"><?php echo e($training->uploader_email); ?> </a>
                <?php endif; ?>
              </td>             
              <td>
                <a href="/managefiles/training/edit/<?php echo e($training->id); ?>" class="btn btn-success btn-sm">Edit</a>
                <a href="/managefiles/training/remove/<?php echo e($training->id); ?>" class="btn btn-danger btn-sm" id="remove_file_button">Remove</a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <div class="text-center"><?php echo e($trainings->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>