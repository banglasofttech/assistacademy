<?php $__env->startSection('title', "Edit Video"); ?>

<?php $__env->startSection('content_title', "Edit Video"); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-9">
        <form class="panel-body" method="POST" action="<?php echo e(route('editVideo')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


             <div class="form-group">
              <label class="control-label " for="file_catagory">File category</label>
              <div id="csrf_catagory" data-token='<?php echo e(csrf_token()); ?>'></div>
              <select class="form-control" name="catagory_id" id="file_catagory" style="width: 200px; height: 33px;">
                    <option value="" selected disabled>--Select Category--</option>
                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($category->id); ?>"><?php echo e($category->catagory_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <option value="add-catagory">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label>File Name</label>
                <input type="text" class="form-control" placeholder="File Name" id="file_name" name="file_name" required autofocus value="<?php echo e($video->file_name); ?>" />
            </div>

            <div class="form-group">
                <label>Select New MP4 File (<span id="file_format" style="color: gray;">If you want to remove old file</span>)</label>
                <input type="file" class=" " id="file" name="file"/>
            </div>

            <div class="form-group">
                <label>Select New Banner (<span id="thumb_fromat" style="color: gray;">If you want to remove old banner</span>)</label>
                <input type="file" class=" " id="thumbnail" name="thumbnail" accept="image/x-png,image/gif,image/jpeg"/>
            </div>

            <input type="hidden" name="id"  value="<?php echo e($video->id); ?>" />

            <div class="form-group">
             <input type="submit" class="btn btn-success" id="upload_file_button" value="Submit">
           </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>