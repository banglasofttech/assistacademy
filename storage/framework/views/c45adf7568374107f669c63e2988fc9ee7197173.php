<?php $__env->startSection('title', "Manage Training"); ?>

<?php $__env->startSection('content_title', "Manage Training"); ?>

<?php $__env->startSection('content'); ?>

      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">File Name</th>
            <th scope="col">Catagory</th>
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
          <?php $__currentLoopData = $videos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $video): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php
            $contentLink='/videos/view/'.$video->id;
          ?>
            <tr>
              <input type="hidden"  id="content_id" value="<?php echo e($video->id); ?>" >
              <td><a href=<?php echo e($contentLink); ?>> <?php echo e($video->file_name); ?></a></td>
              <td><?php echo e($video->catagory_id); ?></td>
              <td><?php echo e($video->total_view); ?></td>
              <td><?php echo e($video->users); ?></td>
              <td>
                <?php if(Auth::user()->user_type=="author"): ?>
                  <?php echo e($video->created_at); ?>

                <?php else: ?>
                  <a href="/author/<?php echo e($video->user_id); ?>"><?php echo e($video->uploader_email); ?> </a>
                <?php endif; ?>
              </td>  
              <td id="remove_file">
                <a href="/managefiles/videos/remove/<?php echo e($video->id); ?>" class="btn btn-danger" id="remove_file_button">Remove</a>
              </td>

              <td id="undo_section" style="display: none">
                <span id="admin_action_message" class="text-danger">Deleted</span>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <div class="text-center"><?php echo e($videos->links()); ?></div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>