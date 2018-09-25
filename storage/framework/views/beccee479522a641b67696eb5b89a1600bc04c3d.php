<?php $__env->startSection('title', "Upload File"); ?>

<?php $__env->startSection('content_title', "Upload new File"); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-9">
        <form class="panel-body" method="POST" action="<?php echo e(route('upload')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


             <div class="form-group">
              <label class="control-label " for="file_catagory">File category</label>
              <div id="csrf_catagory" data-token='<?php echo e(csrf_token()); ?>'></div>
              <select class="form-control" name="catagory_id" id="file_catagory" required autofocus style="width: 200px; height: 33px;">
                    <option value="" selected disabled>--Select Category--</option>
                    <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catagory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <option value="<?php echo e($catagory->id); ?>"><?php echo e($catagory->catagory_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <option value="add-catagory">Other</option>
                </select>
            </div>

             <div class="form-group">
              <label class="control-label " for="file_type">File Type</label>
              <select class="form-control" id="file-type" name="file_type" required autofocus style="width: 200px; height: 33px;">
                <option value="" selected disabled>--Select Type--</option>
                <option value="book">Book</option>
                <option value="video">Video</option>
                <option value="ppt">PPT</option>
              </select>
            </div>

            <div class="form-group">
                <label>File Name</label>
                <input type="text" class="form-control" placeholder="File Name" id="file_name" name="file_name" required autofocus/>
            </div>

            <div class="form-group">
                <label>Select File (<span id="file_format" style="color: gray;">pdf,mp4,ppt,pptx</span>)</label>
                <input type="file" class=" " id="file" name="file" required autofocus/>
            </div>

            <div class="form-group">
                <label>Select Banner (<span id="thumb_fromat" style="color: gray;">jpg,jpeg,png</span>)</label>
                <input type="file" class=" " id="thumbnail" name="thumbnail" accept="image/x-png,image/gif,image/jpeg" required autofocus/>
            </div>

            
            <input type="hidden" name="uploader_email" id="uploader_email" value="<?php echo e(Auth::user()->email); ?>" />
            <input type="hidden" name="viewer_id"  value="0" />

            <div class="form-group">
             <input type="submit" class="btn btn-success" id="upload_file_button" value="Upload">
           </div>

        </form>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>