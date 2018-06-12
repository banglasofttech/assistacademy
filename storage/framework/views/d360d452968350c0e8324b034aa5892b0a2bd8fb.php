<?php $__env->startSection('title', "Author Request"); ?>

<?php $__env->startSection('content_title', "Author Request"); ?>

<?php $__env->startSection('content'); ?>

  <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Occupation</th>
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
        <td><?php echo e($user->occupation); ?></td>
        <td><?php echo e($user->organization); ?></td>
        
        <td id="accept_reject_author">
          <a href="<?php echo e(asset('/authorrequest/accept/'.$user->id)); ?>" class="btn btn-success" id="accept_author_request_button">Accept</a>
          <a href="<?php echo e(asset('/authorrequest/reject/'.$user->id)); ?>" class="btn btn-danger" id="reject_author_request_button">Reject</a>
        </td>

        <td id="undo_section" style="display: none">
          <span id="admin_action_message" class="text-danger">Accepted</span>
          <a href="#" class="btn btn-primary" id="undo_admin_action_button">Undo</a>
        </td>
      </tr>

      <!-- Modal -->
      <div class="modal fade" id="acceptAuthorModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLongTitle">Accept Request</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Do you want to make him/her author ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <a href="/author/<?php echo e($user->id); ?>" id="accept_author_button" class="btn btn-primary">Yes</a>
            </div>
          </div>
        </div>
      </div>
  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

<div class="text-center"><?php echo e($users->links()); ?></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>