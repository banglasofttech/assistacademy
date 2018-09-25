<?php $__env->startSection('title', "Book Request"); ?>

<?php $__env->startSection('content_title', "Book Request"); ?>

<?php $__env->startSection('content'); ?>

  <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Uploaded By</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
    
  </thead>
  <tbody>
    <?php $i=0 ?>
    <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $book): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><a href="<?php echo e(asset('books/view/'.$book->id)); ?>"> <?php echo e($book->file_name); ?></a></td>
        <td><a href="<?php echo e(asset('author/'.$users[$i]->id)); ?>"><?php echo e($users[$i]->first_name); ?> <?php echo e($users[$i]->last_name); ?></td>
        <td><?php echo e($category[$i++]->catagory_name); ?></td>
        
        <td>
          <a href="<?php echo e(asset('/bookrequest/accept/'.$book->id)); ?>" class="btn btn-success">Accept</a>
          <a href="<?php echo e(asset('/bookrequest/reject/'.$book->id)); ?>" class="btn btn-danger">Reject</a>
        </td>
      </tr>
  
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </tbody>
</table>

<div class="text-center"><?php echo e($books->links()); ?></div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>