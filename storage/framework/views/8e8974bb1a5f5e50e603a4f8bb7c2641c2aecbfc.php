<?php $__env->startSection('title', "Add Training"); ?>

<?php $__env->startSection('content_title', "Add Training"); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-9">
        <form class="panel-body" method="POST" action="<?php echo e(route('addtraining')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


             <div class="form-group">
              <label class="control-label" for="file_catagory">Catagory</label>
              <div id="csrf_catagory" data-token='<?php echo e(csrf_token()); ?>'></div>
              <select class="form-control" id="file_catagory" name="catagory_id" required autofocus style="width: 200px; height: 33px;">
                    <option value="" selected disabled>--Select Catagory--</option>
                    <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catagory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($catagory->id); ?>"><?php echo e($catagory->catagory_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <option value="add-catagory">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Enter Title" name="title" required autofocus/>
            </div>

            <div class="form-group">
                <label>Description</label> 
                <textarea name="description" required placeholder="Enter Training Description" class="form-control" autofocus></textarea>
            </div>

            <div class="form-group">
                <label>Training Fee</label> 
                <input type="number" class="form-control" placeholder="Enter 0 for free training" name="fee" required autofocus/>

            </div>

            <div class="form-group">
                <label>Select File (<span id="file_format" style="color: gray;">mp4</span>)</label>
                <input type="file" name="file" required autofocus/>
            </div>

            <div class="form-group">
                <label>Select Thumbnail (<span id="thumb_fromat" style="color: gray;">jpg,jpeg,png</span>)</label>
                <input type="file" name="thumbnail" required autofocus/>
            </div>

            <input type="hidden" name="uploader_email" value="<?php echo e(Auth::user()->email); ?>" />
            <input type="hidden" name="viewer_id"  value="0" />

            <div class="form-group">
             <input type="submit" class="btn btn-success" id="upload_file_button" value="Add Training">
           </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>