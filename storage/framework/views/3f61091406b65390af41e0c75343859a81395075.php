<?php $__env->startSection('title', "Corporate User Request"); ?>

<?php $__env->startSection('content_title', "Corporate User Request"); ?>

<?php $__env->startSection('content'); ?>

  <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Institution</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php
      $id=$user->id;
    ?>
      <tr>
        <input type="hidden"  id="request_user_id" value="<?php echo e($user->id); ?>" >
        <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></td>
        <td><?php echo e($user->email); ?></td>
        <td><?php echo e($user->organization); ?></td>
        
        <td id="accept_reject_author">
          <a href="<?php echo e(asset('/corporaterequest/accept/'.$user->id)); ?>" class="btn btn-success" id="accept_author_request_button">Accept</a>
          <a href="<?php echo e(asset('/corporaterequest/reject/'.$user->id)); ?>" class="btn btn-danger" id="reject_author_request_button">Reject</a>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

<div class="text-center"><?php echo e($users->links()); ?></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>