

<?php $__env->startSection('title', "Leraner List"); ?>

<?php $__env->startSection('content_title', "Learner List"); ?>

<?php $__env->startSection('content'); ?>

  <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <input type="hidden"  id="request_user_id" value="<?php echo e($user->id); ?>" >
        <td><?php echo e($user->first_name); ?> <?php echo e($user->last_name); ?></td>
        <td><?php echo e($user->email); ?></td>
        
        <td id="accept_reject_author">
          <a href="/makeauthor/<?php echo e($user->id); ?>" class="btn btn-success" id="make_author_button">Make Author</a>
        </td>

        <td id="undo_section" style="display: none">
          <span id="admin_action_message" class="text-danger">Accepted</span>
          <a href="#" class="btn btn-primary" id="undo_admin_action_button">Undo</a>
        </td>
      </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>

</table>

<div class="text-center"><?php echo e($users->links()); ?></div>
	

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>