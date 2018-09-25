

<?php $__env->startSection('title', "Add Training"); ?>

<?php $__env->startSection('content_title', "Add Training"); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-md-7">
        <form class="panel-body" method="POST" action="<?php echo e(route('addtraining')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>


             <div class="form-group">
              <label class="control-label" for="file_catagory">Category</label>
              <div id="csrf_catagory" data-token='<?php echo e(csrf_token()); ?>'></div>
              <select class="form-control" id="file_catagory" name="catagory_id" required autofocus style="width: 200px; height: 33px;">
                    <option value="" selected disabled>--Select Category--</option>
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
                <label>About Trainer</label> 
                <textarea name="trainer_description" required placeholder="Enter something about Trainer" class="form-control" autofocus></textarea>
            </div>

            <div class="form-group">
                <label>Training Duration</label> <br>
                <input type="number" class="form-control" placeholder="Enter training duration" name="duration" required autofocus style="display: inline; width: 250px"/>
                <select class="form-control" name="duration_type" style="display: inline; width: 100px">
                    <option value="Hours">Hours</option>
                    <option value="Days">Days</option>
                    <option value="Months">Months</option>
                    <option value="Year">Year</option>
                  </select>
            </div>

            <div class="form-group">
                <label>Training Fee</label> 
                <input type="number" class="form-control" placeholder="Enter 0 for free training" name="fee" required autofocus/>
            </div>

            <div class="form-group">
                <label>Objective</label> 
                <textarea name="objective" required placeholder="Enter Training Objective separated with comma (,)" class="form-control" autofocus></textarea>
            </div>

            <div class="form-group">
                <label>Introduction</label> 
                <textarea name="introduction_text" required placeholder="Enter Introduction" class="form-control" autofocus></textarea>
            </div>

            <div class="form-group">
                <label>Select Introduction File (<span id="file_format" style="color: gray;">pdf, ppt, mp4</span>)</label>
                <input type="file" name="introduction_file"/>
            </div>

            <div class="form-group">
                <label>Select Video Files (<span id="file_format" style="color: gray;">You can select multiple mp4 files</span>)</label>
                <input type="file" name="video_files[]" multiple />
            </div>

            <div class="form-group">
                <label>Select PPT Files (<span id="file_format" style="color: gray;">You can select multiple ppt files</span>)</label>
                <input type="file" name="ppt_files[]" multiple />
            </div>

            <div class="form-group">
                <label>Select Banner (<span id="thumb_fromat" style="color: gray;">jpg, jpeg, png</span>)</label>
                <input type="file" name="thumbnail" accept="image/x-png,image/gif,image/jpeg" required autofocus/>
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