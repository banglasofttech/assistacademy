<?php $__env->startSection('title', "Author"); ?>

<?php $__env->startSection('content'); ?>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/author_profile.css')); ?>">

<div class="content profile_content">
    <div class="courses item-section">
    <div class="col-lg-12 col-sm-12">
    <div class="card hovercard">
        <div class="card-background">
            <img class="card-bkimg" alt="" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSALahbXVT4TmSq-jBr1wuLAbJhXRAOXNwP9Lgrr-EnBnLMZQAs">
        </div>
        <div class="useravatar">
            <img alt="" src="http://top-channel.tv/wp-content/uploads/fototedites/burri-bukur.jpg">
        </div>
        <div class="card-info"> 
            <span class="card-title"><?php echo e($title); ?></span>
        </div>
        <div class="row d-flex justify-content-around contact_info text-light">
            <div class="col-lg-4 "><i class="text-warning fa fa-phone"></i> <?php echo e($author->phone); ?></div>
            <div class="col-lg-4 "><i class="text-warning fa fa-globe"></i> <?php echo e($author->country); ?></div>
            <div class="col-lg-4 "><i class="text-warning fa fa-envelope"></i> <?php echo e($author->email); ?></div> 
        </div>
    </div>
    <div class="row author_content btn-pref">
        <a class="col-lg-3 btn btn-primary btn-sm" href="#">Personal Information</a>
        <a class="col-lg-1 btn btn-default btn-sm" href="<?php echo e(asset('books/author/'.$author->email)); ?>">Books</a>
        <a class="col-lg-2 btn btn-default btn-sm" href="<?php echo e(asset('videos/author/'.$author->email)); ?>">Videos</a>
        <a class="col-lg-1 btn btn-default btn-sm" href="<?php echo e(asset('ppts/author/'.$author->email)); ?>">PPTs</a>
        <a class="col-lg-2 btn btn-default btn-sm" href="<?php echo e(asset('training/author/'.$author->email)); ?>">Training</a>
        <a class="col-lg-2 btn btn-default btn-sm" href="<?php echo e(asset('courses/author/'.$author->email)); ?>">Courses</a>
        
    </div>

    <div class="personal_info text-dark">
        <b class="text-secondary">Address: </b> <?php echo e($author->address); ?>

        <br>
        <b class="text-secondary">Occupation: </b> <?php echo e($author->occupation); ?>

        <br>
        <b class="text-secondary">Organization: </b> <?php echo e($author->organization); ?>

        <br>
        <b class="text-secondary">Joined at: </b> <?php echo e($author->created_at); ?>


        <br><br>
        <b class="text-secondary">Books: </b> <?php echo e($books); ?>

        <br>
        <b class="text-secondary">Videos: </b> <?php echo e($videos); ?>

        <br>
        <b class="text-secondary">PPTs: </b> <?php echo e($ppts); ?>

        <br>
        <b class="text-secondary">Training: </b> <?php echo e($training); ?>

        <br>
        <b class="text-secondary">Courses: </b> <?php echo e($courses); ?>

    </div>
    
    </div>
</div>
</div>

    <script type="text/javascript">
        $(document).ready(function() {
            $(".btn-pref .btn").click(function () {
                $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
                // $(".tab").addClass("active"); // instead of this do the below 
                $(this).removeClass("btn-default").addClass("btn-primary");   
            });
        });
    </script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>