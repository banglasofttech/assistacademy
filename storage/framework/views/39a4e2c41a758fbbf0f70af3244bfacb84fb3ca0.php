

<?php $__env->startSection('title', "Welcome to Assist Academy"); ?>

<?php $__env->startSection('content'); ?>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active home" >
        <!-- Home Slider Item -->
        <div class="home_slider_background" style="background-image:url(content/image/home_slider_1.jpg);">
            <div class="home_slider_content">
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <div class="home_slider_title">Assist Academy</div>
                            <div class="home_slider_subtitle">Future Of Education Technology</div>
                            <div class="home_slider_form_container">
                                    
                                <form method="post" class="d-flex flex-row align-items-center justify-content-center" action="<?php echo e(route('filesection')); ?>">
                                	<?php echo e(csrf_field()); ?>

                                    <select class="dropdown_item_select custom-select" name="section" required>
                                        <option value="" selected disabled>Select a Section</option>
                                        <option value="courses">Course</option>
                                        <option value="training">Training</option>
                                        <option value="books">Books</option>
                                        <option value="videos">Videos</option>
                                        <option value="ppts">PPT</option>
                                    </select>
                                    <select class="dropdown_item_select custom-select" required name="catagory_id">
                                        <option value="" selected disabled>Select a Category</option>
                                        <option value="0">All Category</option>
                                        <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        	<option value="<?php echo e($Category->id); ?>"><?php echo e($Category->catagory_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                    <button type="submit" class="home_section_button"> GO</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>

    <!-- Popular Courses -->
    <div class="courses item-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex section_title_container">
                        <h2 class="mr-auto p-2 section_title">Recent Courses</h2>

                        <form method="post" class="d-flex flex-row align-items-center justify-content-center" action="<?php echo e(route('filesection')); ?>">
                    		<?php echo e(csrf_field()); ?>

                    		<input type="hidden" name="section" value="courses">
	                        <select name="catagory_id" class="p-2 dropdown_item_select custom-select" required>
                                <option value="0">All Category</option>
                                <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                	<option value="<?php echo e($Category->id); ?>"><?php echo e($Category->catagory_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        </select>
	                        <input type="submit" class="p-2 btn section_button" value="View Courses">
                   	 	</form>
                    </div>
                </div>
            </div>

            <div id="carouselCourseControls" class="carousel slide" data-ride="carousel" data-interval="false">

                <?php if(count($courses)>0): ?>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row courses_row">
                            	<?php for($i=0; $i < 4 && $i < count($courses); $i++): ?>
    	                            <div class="col-lg-3 course_col">
    	                                <div class="course"><a href="<?php echo e(asset('courses/preview/'.$courses[$i]->id)); ?>">
    	                                    <div class="course_image"><img src="<?php echo e(asset('/storage/thumbnail/course/'.$courses[$i]->thumbnail)); ?>" alt=""></div>
    	                                    <div class="course_body">
    	                                        <h4 class="course_title"><?php echo e($courses[$i]->title); ?></h4>

	                                            <div class="course_teacher"><?php echo e($courses[$i]->author); ?></div>

    	                                        <div class="course_text">
    	                                            <p><?php echo e($courses[$i]->description); ?></p>
    	                                        </div>

                                                <div class="d-flex course-footer">
                                                    <div class="mr-auto p-2">
                                                    <i class="fa fa-clock-o"></i> <?php echo e($courses[$i]->duration); ?> <?php echo e($courses[$i]->duration_type); ?></div>
                                                    <div class="p-2 course_price">
                                                    <i class="fa fa-dollar"></i>
                                                        <?php if($courses[$i]->course_fee>0): ?>
                                                            <?php echo e($courses[$i]->course_fee); ?>  
                                                        <?php else: ?>
                                                            Free
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
    	                                    </div>
    	                                </a></div>
    	                            </div>
    	                        <?php endfor; ?>
                            </div>
                        </div>
                        
                        <?php for($j=2; $j < 4 && $j < count($courses); $j++): ?>
                            <div class="carousel-item">
                                <div class="row courses_row">
                                    <?php for($i=$j; $i < $j*4 && $i < count($courses); $i++): ?>
                                        <div class="col-lg-3 course_col">
                                            <div class="course"><a href="<?php echo e(asset('courses/preview/'.$courses[$i]->id)); ?>">
                                                <div class="course_image"><img src="<?php echo e(asset('/storage/thumbnail/course/'.$courses[$i]->thumbnail)); ?>}" alt=""></div>
                                                <div class="course_body">
                                                    <h4 class="course_title"><?php echo e($courses[$i]->title); ?></h4>

                                                <div class="course_teacher"><?php echo e($courses[$i]->author); ?></div>

                                                <div class="course_text">
                                                    <p><?php echo e($courses[$i]->description); ?></p>
                                                </div>

                                                <div class="d-flex course-footer">
                                                    <div class="mr-auto p-2">
                                                    <i class="fa fa-clock-o"></i> <?php echo e($courses[$i]->duration); ?> <?php echo e($courses[$i]->duration_type); ?></div>
                                                    <div class="p-2 course_price">
                                                    <i class="fa fa-dollar"></i>
                                                        <?php if($courses[$i]->course_fee>0): ?>
                                                            <?php echo e($courses[$i]->course_fee); ?>  
                                                        <?php else: ?>
                                                            Free
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </a></div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>
                </div>


          <div class="slider_nav slider_prev" href="#carouselCourseControls" role="button" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
        <div class="slider_nav slider_next" href="#carouselCourseControls" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

        </div>
    </div>

    <!-- Training Section -->
    <div class="Trainging item-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex section_title_container">
                        <h2 class="mr-auto p-2 section_title">Recent Training</h2>

                        <form method="post" class="d-flex flex-row align-items-center justify-content-center" action="<?php echo e(route('filesection')); ?>">
                    		<?php echo e(csrf_field()); ?>

                    		<input type="hidden" name="section" value="training">
	                        <select name="catagory_id" class="p-2 dropdown_item_select custom-select" required>
                                <option value="0">All Category</option>
                                <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                	<option value="<?php echo e($Category->id); ?>"><?php echo e($Category->catagory_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        </select>
	                        <input type="submit" class="p-2 btn section_button" value="View Trainings">
                   	 	</form>
                    </div>
                </div>
            </div>

            <div id="carouselTrainingControls" class="carousel slide" data-ride="carousel" data-interval="false">
                <?php if(count($trainings)>0): ?>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row courses_row">
                                <?php for($i=0; $i < 4 && $i < count($trainings); $i++): ?>
                                    <div class="col-lg-3 course_col">
                                        <div class="course"><a href="<?php echo e(asset('training/preview/'.$trainings[$i]->id)); ?>">
                                            <div class="course_image"><img src="<?php echo e(asset('/storage/thumbnail/training/'.$trainings[$i]->thumbnail)); ?>" alt=""></div>
                                            <div class="course_body">
                                                <h4 class="course_title"><?php echo e($trainings[$i]->title); ?></h4>
                                                
                                                <div class="course_teacher"><?php echo e($trainings[$i]->author); ?></div>

                                                <div class="d-flex course-footer">
                                                    <div class="mr-auto p-2">
                                                    <i class="fa fa-clock-o"></i> <?php echo e($trainings[$i]->duration); ?> <?php echo e($trainings[$i]->duration_type); ?></div>
                                                    <div class="p-2 course_price">
                                                    <i class="fa fa-dollar"></i>
                                                        <?php if($trainings[$i]->fee>0): ?>
                                                            <?php echo e($trainings[$i]->fee); ?>  
                                                        <?php else: ?>
                                                            Free
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </a></div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        
                       <?php for($j=2; $j < 4 && $j < count($trainings); $j++): ?>
                            <div class="carousel-item">
                                <div class="row courses_row">
                                    <?php for($i=$j; $i < $j*4 && $i < count($trainings); $i++): ?>
                                        <div class="col-lg-3 course_col">
                                            <div class="course"><a href="<?php echo e(asset('training/preview/'.$trainings[$i]->id)); ?>">
                                                <div class="course_image"><img src="<?php echo e(asset('/storage/thumbnail/training/'.$trainings[$i]->thumbnail)); ?>" alt=""></div>
                                                <div class="course_body">
                                                    <h4 class="course_title"><?php echo e($trainings[$i]->title); ?></h4>
                                                
                                                <div class="course_teacher"><?php echo e($trainings[$i]->author); ?></div>

                                                <div class="d-flex course-footer">
                                                    <div class="mr-auto p-2">
                                                    <i class="fa fa-clock-o"></i> <?php echo e($trainings[$i]->duration); ?> <?php echo e($trainings[$i]->duration_type); ?></div>
                                                    <div class="p-2 course_price">
                                                    <i class="fa fa-dollar"></i>
                                                        <?php if($trainings[$i]->fee>0): ?>
                                                            <?php echo e($trainings[$i]->fee); ?>  
                                                        <?php else: ?>
                                                            Free
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </a></div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>
                </div>


          <div class="slider_nav slider_prev" href="#carouselTrainingControls" role="button" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
        <div class="slider_nav slider_next" href="#carouselTrainingControls" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
        </div>
    </div>


    <!-- Books Section -->
    <div class="Books item-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex section_title_container">
                        <h2 class="mr-auto p-2 section_title">Recent Books</h2>

                        <form method="post" class="d-flex flex-row align-items-center justify-content-center" action="<?php echo e(route('filesection')); ?>">
                    		<?php echo e(csrf_field()); ?>

                    		<input type="hidden" name="section" value="books">
	                        <select name="catagory_id" class="p-2 dropdown_item_select custom-select" required>
                                <option value="0">All Category</option>
                                <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                	<option value="<?php echo e($Category->id); ?>"><?php echo e($Category->catagory_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        </select>
	                        <input type="submit" class="p-2 btn section_button" value="View Books">
                   	 	</form>
                    </div>
                </div>
            </div>

            <div id="carouselBooksControls" class="carousel slide" data-ride="carousel" data-interval="false">
                <?php if(count($books)>0): ?>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row courses_row">
                                <?php for($i=0; $i < 4 && $i < count($books); $i++): ?>
                                    <div class="col-lg-3 course_col">
                                        <div class="course"><a href="<?php echo e(asset('books/view/'.$books[$i]->id)); ?>">
                                            <div class="course_image"><img src="<?php echo e(asset('/storage/thumbnail/books/'.$books[$i]->thumbnail)); ?>" alt=""></div>
                                            <div class="course_body">
                                                <h4 class="course_title"><?php echo e($books[$i]->file_name); ?></h4>
                                                <div class="d-flex">
                                                    <div class="course_teacher"><?php echo e($books[$i]->author); ?></div>
                                                </div>
                                            </div>
                                        </a></div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        
                        <?php for($j=2; $j < 4 && $j < count($books); $j++): ?>
                            <div class="carousel-item">
                                <div class="row courses_row">
                                    <?php for($i=$j; $i < $j*4 && $i < count($books); $i++): ?>
                                        <div class="col-lg-3 course_col">
                                            <div class="course"><a href="<?php echo e(asset('books/view/'.$books[$i]->id)); ?>">
                                                <div class="course_image"><img src="<?php echo e(asset('/storage/thumbnail/books/'.$books[$i]->thumbnail)); ?>" alt=""></div>
                                                <div class="course_body">
                                                    <h4 class="course_title"><?php echo e($books[$i]->file_name); ?></h4>
                                                    <div class="d-flex">
                                                        <div class=" course_teacher"><?php echo e($books[$i]->author); ?></div>
                                                    </div>
                                                </div>
                                            </a></div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>
                </div>


          <div class="slider_nav slider_prev" href="#carouselBooksControls" role="button" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
        <div class="slider_nav slider_next" href="#carouselBooksControls" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

        </div>
    </div>

    <!-- Videos Section -->
    <div class="Videos item-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex section_title_container">
                        <h2 class="mr-auto p-2 section_title">Recent Videos</h2>
                        
                        <form method="post" class="d-flex flex-row align-items-center justify-content-center" action="<?php echo e(route('filesection')); ?>">
                    		<?php echo e(csrf_field()); ?>

                    		<input type="hidden" name="section" value="videos">
	                        <select name="catagory_id" class="p-2 dropdown_item_select custom-select" required>
                                <option value="0">All Category</option>
                                <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                	<option value="<?php echo e($Category->id); ?>"><?php echo e($Category->catagory_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        </select>
	                        <input type="submit" class="p-2 btn section_button" value="View Videos">
                   	 	</form>
                    </div>
                </div>
            </div>

            <div id="carouselVideosControls" class="carousel slide" data-ride="carousel" data-interval="false">
                <?php if(count($videos)>0): ?>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row courses_row">
                                <?php for($i=0; $i < 4 && $i < count($videos); $i++): ?>
                                    <div class="col-lg-3 course_col">
                                        <div class="course"><a href="<?php echo e(asset('videos/view/'.$videos[$i]->id)); ?>">
                                            <div class="course_image"><img src="<?php echo e(asset('/storage/thumbnail/videos/'.$videos[$i]->thumbnail)); ?>" alt=""></div>
                                            <div class="course_body">
                                                <h4 class="course_title"><?php echo e($videos[$i]->file_name); ?></h4>
                                                <div class="d-flex">
                                                    <div class="course_teacher"><?php echo e($videos[$i]->author); ?></div>
                                                </div>
                                            </div>
                                        </a></div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        
                        <?php for($j=2; $j < 4 && $j < count($videos); $j++): ?>
                            <div class="carousel-item">
                                <div class="row courses_row">
                                    <?php for($i=$j; $i < $j*4 && $i < count($videos); $i++): ?>
                                        <div class="col-lg-3 course_col">
                                            <div class="course"><a href="<?php echo e(asset('videos/view/'.$videos[$i]->id)); ?>">
                                                <div class="course_image"><img src="<?php echo e(asset('/storage/thumbnail/videos/'.$videos[$i]->thumbnail)); ?>" alt=""></div>
                                                <div class="course_body">
                                                    <h4 class="course_title"><?php echo e($videos[$i]->file_name); ?></h4>
                                                    <div class="d-flex">
                                                        <div class=" course_teacher"><?php echo e($videos[$i]->author); ?></div>
                                                    </div>
                                                </div>
                                            </a></div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>
                </div>


        <div class="slider_nav slider_prev" href="#carouselVideosControls" role="button" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
        <div class="slider_nav slider_next" href="#carouselVideosControls" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

        </div>
    </div>

    <!-- PPT Section -->
    <div class="PPT item-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex section_title_container">
                        <h2 class="mr-auto p-2 section_title">Recent PPT</h2>

                        <form method="post" class="d-flex flex-row align-items-center justify-content-center" action="<?php echo e(route('filesection')); ?>">
                    		<?php echo e(csrf_field()); ?>

                    		<input type="hidden" name="section" value="ppts">
	                        <select name="catagory_id" class="p-2 dropdown_item_select custom-select" required>
                                <option value="0">All Category</option>
                                <?php $__currentLoopData = $catagories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                	<option value="<?php echo e($Category->id); ?>"><?php echo e($Category->catagory_name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	                        </select>
	                        <input type="submit" class="p-2 btn section_button" value="View PPTs">
                   	 	</form>
                    </div>
                </div>
            </div>

            <div id="carouselPPTControls" class="carousel slide" data-ride="carousel" data-interval="false">
                <?php if(count($ppts)>0): ?>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <div class="row courses_row">
                                <?php for($i=0; $i < 4 && $i < count($ppts); $i++): ?>
                                    <div class="col-lg-3 course_col">
                                        <div class="course"><a href="<?php echo e(asset('ppts/view/'.$ppts[$i]->id)); ?>">
                                            <div class="course_image"><img src="<?php echo e(asset('/storage/thumbnail/ppts/'.$ppts[$i]->thumbnail)); ?>" alt=""></div>
                                            <div class="course_body">
                                                <h4 class="course_title"><?php echo e($ppts[$i]->file_name); ?></h4>
                                                <div class="d-flex">
                                                    <div class="course_teacher"><?php echo e($ppts[$i]->author); ?></div>
                                                </div>
                                            </div>
                                        </a></div>
                                    </div>
                                <?php endfor; ?>
                            </div>
                        </div>
                        
                        <?php for($j=2; $j < 4 && $j < count($ppts); $j++): ?>
                            <div class="carousel-item">
                                <div class="row courses_row">
                                    <?php for($i=$j; $i < $j*4 && $i < count($ppts); $i++): ?>
                                        <div class="col-lg-3 course_col">
                                            <div class="course"><a href="<?php echo e(asset('ppts/view/'.$ppts[$i]->id)); ?>">
                                                <div class="course_image"><img src="<?php echo e(asset('/storage/thumbnail/ppts/'.$ppts[$i]->thumbnail)); ?>" alt=""></div>
                                                <div class="course_body">
                                                    <h4 class="course_title"><?php echo e($ppts[$i]->file_name); ?></h4>
                                                    <div class="d-flex">
                                                        <div class=" course_teacher"><?php echo e($ppts[$i]->author); ?></div>
                                                    </div>
                                                </div>
                                            </a></div>
                                        </div>
                                    <?php endfor; ?>
                                </div>
                            </div>
                        <?php endfor; ?>
                    </div>
                    <?php endif; ?>
                </div>


        <div class="slider_nav slider_prev" href="#carouselPPTControls" role="button" data-slide="prev"><i class="fa fa-angle-left" aria-hidden="true"></i></div>
        <div class="slider_nav slider_next" href="#carouselPPTControls" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i></div>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>