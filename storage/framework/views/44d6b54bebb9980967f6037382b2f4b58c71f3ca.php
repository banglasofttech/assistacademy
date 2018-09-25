

<?php $__env->startSection('title', "Manage Category"); ?>

<?php $__env->startSection('content_title', "Manage Category"); ?>

<?php $__env->startSection('content'); ?>

      <table class="table table-striped ">
        <thead class="thead-dark">
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Category Name</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($category->id); ?></td>
              <td><?php echo e($category->catagory_name); ?></td>       
              <td id="remove_file">
                <a href="<?php echo e(asset('/remove-category/remove/'.$category->id )); ?>" class="btn btn-danger" id="remove_file_button">Remove</a>
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
      <div class="text-center"><?php echo e($categories->links()); ?></div>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>