\

<?php $__env->startSection('title', "Add Course"); ?>

<?php $__env->startSection('content_title', "Add Course"); ?>

<?php $__env->startSection('content'); ?>

    <div class="col-md-9">
        <form class="panel-body" method="POST" action="<?php echo e(route('addcourse')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="author_email" value="<?php echo e(Auth::user()->email); ?>">
            <table class="table table-striped table-hover">

              <tr class="form-group">
                <td>
                  <label class="control-label " for="file_catagory">Course catagory</label>
                </td>
                <td>
                  <div id="csrf_catagory" data-token='<?php echo e(csrf_token()); ?>'></div>
                  <select class="form-control" name="catagory_id" id="file_catagory" action="<?php echo e(route('getsubcatagories')); ?>" required autofocus style="width: 200px; height: 33px;">
                        <option value="" selected disabled>--Select Catagory--</option>
                        <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $catagory): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <option value="<?php echo e($catagory->id); ?>"><?php echo e($catagory->catagory_name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <option value="add-catagory" id="add-catagory">Other</option>
                    </select>
                </td>
              </tr>

              <!-- <tr class="form-group" id="sub_catagory" style="display: none;">
                <td>
                  <label class="control-label " for="file_sub_catagory">Sub Catagory</label>
                </td>
                <td>
                  <select class="form-control" name="file_sub_catagory" id="file_sub_catagory" style="width: 200px; height: 33px;" >
                        <option value="" selected disabled>--Select Sub Catagory--</option>
                    </select>
                </td>
              </tr>

              <input type="hidden" name="catagory_id" id="catagory_id" value=" " /> -->

              <tr>
                <td>
                  <label>Course Name</label>
                </td>
                <td>
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter Name" name="title" required autofocus />
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>About Trainer</label>
                </td>
                <td>
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter Trainer Information" name="trainer_description" required autofocus/>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Duration</label>
                </td>
                <td>
                  <div class="form-group">
                      <input type="number" class="form-control" id="course_duration" placeholder="Enter Duration in days" name="duration" required autofocus/>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Fee (<span id="title_format" style="color: gray;">BDT</span>)
                  </label>
                </td>
                <td>
                  <div class="form-group">
                      <input type="number" class="form-control" id="course_fee" placeholder="Enter 0 if free" name="course_fee" required autofocus/>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Description</label>
                </td>
                <td>
                  <div class="form-group">
                      <textarea class="form-control" name="description" placeholder="Enter Description" required autofocus></textarea>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Outcome</label>
                </td>
                <td>
                  <div class="form-group">
                   <textarea class="form-control" placeholder="Enter Outcome" name="outcome" required autofocus></textarea>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Introduction</label>
                </td>
                <td>
                  <div class="form-group">
                   <textarea class="form-control" placeholder="Enter Introduction" name="introduction_text" required autofocus ></textarea>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Study Introduction: Video (<span id="title_format" style="color: gray;">mp4 file</span>)
                  </label>
                </td>
                <td>
                  <div class="form-group">
                   <input type="file" class=" " name="study_introduction_video" accept="video/mp4"/>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Material: Book Links</label>
                </td>
                <td>
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Enter Book Links separated with comma (,)" name="book_link"></textarea>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Material: Books 
                    <br>(<span id="title_format" style="color: gray;">pdf file</span>)
                    <br><span id="title_format" style="color: gray;">You can select multiple files</span>
                  </label>
                </td>
                <td>
                  <div class="form-group">
                    <input type="file" class=" " id="file" name="book_files[]" multiple accept="application/pdf"/>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Material: PPT Links</label>
                </td>
                <td>
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Enter PPT Links separated with comma (,)" name="ppt_link"></textarea>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Material: PPTs 
                    <br>(<span id="title_format" style="color: gray;">ppt, pptx file</span>)
                    <br><span id="title_format" style="color: gray;">You can select multiple files</span>
                  </label>
                </td>
                <td>
                  <div class="form-group">
                    <input type="file" class=" " name="ppt_files[]" multiple accept="application/vnd.ms-powerpoint" />
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Material: Video Links</label>
                </td>
                <td>
                  <div class="form-group">
                    <textarea class="form-control" placeholder="Enter Video Links separated with comma (,)" name="video_link"></textarea>
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Material: Videos 
                    <br>(<span id="title_format" style="color: gray;">mp4 file</span>)
                    <br><span id="title_format" style="color: gray;">You can select multiple files</span>
                  </label>
                </td>
                <td>
                  <div class="form-group">
                    <input type="file" class=" " name="video_files[]" multiple multiple accept="video/mp4" />
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Course Thumbnail
                    <br>(<span id="title_format" style="color: gray;">jpg,jpeg,png</span>)
                  </label>
                </td>
                <td>
                  <div class="form-group">
                    <input type="file" class=" " name="course_thumbnail" accept="image/x-png,image/gif,image/jpeg" required />
                  </div>
                </td>
              </tr>

              <tr>
                <td>
                  <label>Exam Question 
                    <br>(<span id="title_format" style="color: gray;">pdf file</span>)
                    <br><span id="title_format" style="color: gray;">You can select multiple files</span>
                  </label>
                </td>
                <td>
                  <div class="form-group">
                    <input type="file" class=" " name="exam_files[]" multiple multiple accept="application/pdf" />
                  </div>
                </td>
              </tr>

              <tr>
                <td><label>Study Instruction</label></td>
                <td></td>
              </tr>    

            </table>
            <table table class="table table-striped table-hover" id="study_instruction_table">
            </table>
            <input type="submit" id="upload_file_button" class="btn btn-success" value="Add Course">
        </form>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.adminpanel', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>