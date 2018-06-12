<?php $__env->startSection('title', "Manage Files"); ?>

<?php $__env->startSection('content_title', "Manage Files"); ?>

<?php $__env->startSection('content'); ?>
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>Section</th>
        <th>Total Files</th>
        <th>Last Upload</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       
        <tr>
          <td>Books</td>
          <td><?php echo e($total_book); ?></td>
          <td>
            <?php if($last_book!=null): ?>
              <?php echo e($last_book->created_at); ?>

            <?php endif; ?>

          </td>
          <td>
            <a href="/managefiles/books" class="btn btn-warning">Manage</a>
          </td>
        </tr>
      <tr>
        <td>Videos</td>
        <td><?php echo e($total_video); ?></td>
        <td>
          <?php if($last_video!=null): ?>
              <?php echo e($last_video->created_at); ?>

          <?php endif; ?>
        </td>
        <td>
          <a href="/managefiles/videos" class="btn btn-warning">Manage</a>
        </td>
      </tr>
      <tr>
        <td>PPTs</td>
        <td><?php echo e($total_ppt); ?></td>
        <td>
          <?php if($last_ppt!=null): ?>
              <?php echo e($last_ppt->created_at); ?>

          <?php endif; ?>
        </td>
        <td>
          <a href="/managefiles/ppts" class="btn btn-warning">Manage</a>
        </td>
      </tr>
    </tbody>
  </table>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>