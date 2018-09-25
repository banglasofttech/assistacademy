

<?php $__env->startSection('title', "Manage PPTs"); ?>

<?php $__env->startSection('content_title', "Manage PPTs"); ?>

<?php $__env->startSection('content'); ?>

      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">File Name</th>
            <th scope="col">Category</th>
            <th scope="col">Views</th>
            <th scope="col">Users</th>
            <th scope="col">
              <?php if(Auth::user()->user_type=="author"): ?>
                Uploaded At
              <?php else: ?>
                Author
              <?php endif; ?>
            </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $ppts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ppt): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $contentLink='/ppts/view/'.$ppt->id;
          ?>
            <tr>
              <input type="hidden"  id="content_id" value="<?php echo e($ppt->id); ?>" >
              <td><a href=<?php echo e($contentLink); ?>> <?php echo e($ppt->file_name); ?></a></td>
              <td><?php echo e($ppt->catagory_id); ?></td>
              <td><?php echo e($ppt->total_view); ?></td>
              <td><?php echo e($ppt->users); ?></td>
              <td>
                <?php if(Auth::user()->user_type=="author"): ?>
                  <?php echo e($ppt->created_at); ?>

                <?php else: ?>
                  <a href="/author/<?php echo e($ppt->user_id); ?>"><?php echo e($ppt->uploader_email); ?> </a>
                <?php endif; ?>
              </td>             
              <td>
                <a href="/managefiles/ppts/edit/<?php echo e($ppt->id); ?>" class="btn btn-success btn-sm">Edit</a>
                <a href="/managefiles/ppts/remove/<?php echo e($ppt->id); ?>" class="btn btn-danger btn-sm">Remove</a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <div class="text-center"><?php echo e($ppts->links()); ?></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>