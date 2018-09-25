<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="AssistAcademy project">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="Bangla Soft Tech">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/bootstrap.min.css')); ?>">

    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/main_styles.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/style/responsive.css')); ?>">
    <link href="<?php echo e(asset('content/plugin/videoPlugin/video-js.css')); ?>" rel="stylesheet" type="text/css">

    <link href="<?php echo e(asset('content/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css">

    <!-- <link href="<?php echo e(asset('content/css/bootstrap.css')); ?>" rel="stylesheet"> -->
    <!-- <link href="<?php echo e(asset('content/css/style.css')); ?>" rel="stylesheet"> -->
    <!-- <link href="<?php echo e(asset('content/css/jquery-ui.css')); ?>" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/css/main.css')); ?>">
</head>
<body>

<div class="super_container">

  <!-- Header -->

  <header class="header">
      
    <!-- Top Bar -->
    <div class="top_bar">
      <div class="top_bar_container">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="top_bar_content d-flex flex-row align-items-center justify-content-start">
                <ul class="top_bar_contact_list">
                  <li><div class="question">Have any confusion?</div></li>
                  <li>
                    <i class="fa fa-phone" aria-hidden="true"></i>
                    <div>+(88) 01672-420600</div>
                  </li>
                  <li>
                    <i class="fa fa-envelope-o" aria-hidden="true"></i>
                    <div>info@assistacademy.org</div>
                  </li>
                </ul>
                <ul class="top_bar_login ml-auto">
                  <?php if(auth()->guard()->guest()): ?>
                    <li class="login_button"><a href="#" data-toggle="modal" data-target="#LoginModalCenter">Become a Trainer/Instructor</a></li>
                  <?php else: ?>
                    <li class="login_button"><a href="<?php echo e(route('logout')); ?>"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Logout</a> 
                      <form action="<?php echo e(route('logout')); ?>" id="logout-form" method="post">
                        <?php echo e(csrf_field()); ?>

                      </form>
                    </li>
                  <?php endif; ?>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>        
    </div>

    <?php if(count($errors) > 0): ?>
      <p class="bg-danger text-white text-center">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($error); ?>

              <br>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </p>
    <?php endif; ?>

    <?php if($errors->has('message')): ?>
      <p class="bg-success text-white text-center">
          <?php echo e($errors->messsage); ?>

      </p>
    <?php endif; ?>

    <!-- Header Content -->
    <div class="header_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header_content d-flex flex-row align-items-center justify-content-start">
              <div class="logo_container">
                <a href="/">
                  <div class="logo_text">Assist<span>Academy</span></div>
                </a>
              </div>
              <nav class="main_nav_contaner ml-auto">
                <ul class="main_nav">
                  <?php if(auth()->guard()->check()): ?>
                    <?php if(Auth::user()->user_type=="admin"|| Auth::user()->user_type=="author"): ?>
                      <li><a href="<?php echo e(asset('/mypanel')); ?>">My Panel</a></li>
                    <?php endif; ?>
                  <?php endif; ?>
                  <li class="dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">E-Learning</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="<?php echo e(asset('/books')); ?>">Books</a>
                          <a class="dropdown-item" href="<?php echo e(asset('/videos')); ?>">Videos</a>
                          <a class="dropdown-item" href="<?php echo e(asset('/ppts')); ?>">PPT</a>
                        </div>
                      </li>

                  <li><a href="<?php echo e(asset('/training')); ?>">Training</a></li>
                  <li><a href="<?php echo e(asset('/courses')); ?>">Courses</a></li>
                  <li><a href="#">Notice</a></li>
                </ul>
                <div class="search_button"><i class="fa fa-search" aria-hidden="true"></i></div>
                <div class="hamburger menu_mm">
                  <i class="fa fa-bars menu_mm" aria-hidden="true"></i>
                </div>
              </nav>

            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Header Search Panel -->
    <div class="header_search_container">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="header_search_content d-flex flex-row align-items-center justify-content-end">
              <form method="POST" class="header_search_form" action="<?php echo e(route('search')); ?>">
                <?php echo e(csrf_field()); ?>

                <input type="hidden" name="file_type" value="all-files">
                <input type="search" name="file_name" class="search_input" placeholder="What are you looking" required="required" autofocus>
                <button class="header_search_button d-flex flex-column align-items-center justify-content-center">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>      
    </div>     
  </header>

  <!-- Mobile Version -->
  <div class="menu d-flex flex-column align-items-end justify-content-start text-right menu_mm trans_400">
    <div class="menu_close_container"><div class="menu_close"><div></div><div></div></div></div>

    <!-- Search Bar -->
    <div class="search">
      <form method="POST" action="<?php echo e(route('search')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="file_type" value="all-files">
        <input type="search" class="search_input menu_mm" placeholder="What are you looking for?" required="required" name="file_name">
        <button type="submit" class="header_search_button d-flex flex-column align-items-center justify-content-center menu_mm">
          <i class="fa fa-search menu_mm" aria-hidden="true"></i>
        </button>
      </form>
    </div>

    <!-- Mobile Version Menu -->
    <nav class="menu_nav">
      <ul class="menu_mm">
        <?php if(auth()->guard()->check()): ?>
          <?php if(Auth::user()->user_type=="admin"|| Auth::user()->user_type=="author"): ?>
            <li><a href="<?php echo e(asset('/mypanel')); ?>">My Panel</a></li>
          <?php endif; ?>
        <?php endif; ?>
        <li class="menu_mm"><a href="<?php echo e(asset('/books')); ?>">Books</a></li>
        <li class="menu_mm"><a href="<?php echo e(asset('/videos')); ?>">Videos</a></li>
        <li class="menu_mm"><a href="<?php echo e(asset('/ppts')); ?>">PPT</a></li>
        <li class="menu_mm"><a href="<?php echo e(asset('/training')); ?>">Training</a></li>
        <li class="menu_mm"><a href="<?php echo e(asset('/courses')); ?>">Courses</a></li>
        <li class="menu_mm"><a href="<?php echo e(asset('/notices')); ?>">Notice</a></li>
      </ul>
    </nav>
  </div>
  
  <!-- Content -->
  <?php echo $__env->yieldContent('content'); ?>

  <!-- Footer -->
  <footer class="footer">
    <div class="footer_background" style="background-image:url(/content/image/footer_background.png)"></div>
    <div class="container">
      <div class="row footer_row">
        <div class="col">
          <div class="footer_content">
            <div class="row">

              <div class="col-lg-3 footer_col">
          
                <!-- Footer About -->
                <div class="footer_section footer_about">
                  <div class="footer_logo_container">
                    <a href="/">
                      <div class="footer_logo_text">Assist<span>Academy</span></div>
                    </a>
                  </div>
                  <div class="footer_social">
                    <ul>
                      <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                      <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                    </ul>
                  </div>
                </div>
                
              </div>

              <div class="col-lg-3 footer_col">
          
                <!-- Footer Contact -->
                <div class="footer_section footer_contact">
                  <div class="footer_title">Contact Us</div>
                  <div class="footer_contact_info">
                    <ul>
                      <li>Email: info@assistacademy.org</li>
                      <li>Phone:  +(88) 01672-420600</li>
                      <li>Road-3A, House-18, Sector-9, Uttara, Dhaka</li>
                    </ul>
                  </div>
                </div>
                
              </div>

              <div class="col-lg-3 footer_col">
          
                <!-- Footer links -->
                <div class="footer_section footer_links">
                  <div class="footer_title">Quick Menu</div>
                  <div class="footer_links_container">
                    <ul>
                      <li><a href="<?php echo e(asset('/')); ?>">Home</a></li>
                      <li><a href="<?php echo e(asset('/books')); ?>">Boooks</a></li>
                      <li><a href="<?php echo e(asset('/videos')); ?>">Videos</a></li>
                      <li><a href="<?php echo e(asset('/ppts')); ?>">PPT</a></li>
                      <li><a href="<?php echo e(asset('/courses')); ?>">Courses</a></li>
                      <li><a href="<?php echo e(asset('/training')); ?>">Trainings</a></li>
                      <li><a href="#">Notice</a></li>
                      <?php if(auth()->guard()->guest()): ?>
                        <li><a href="<?php echo e(asset('login')); ?>">Login</a></li>
                      <?php else: ?>
                        <li><a href="<?php echo e(route('logout')); ?>" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Logout</a> 
                          <form action="<?php echo e(route('logout')); ?>" id="logout-form" method="post">
                            <?php echo e(csrf_field()); ?>

                          </form>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </div>
                </div>
                
              </div>

              <div class="col-lg-3 footer_col clearfix">
          
                <!-- Footer links -->
                <div class="footer_section footer_contact">
                  <div class="footer_title">T&C</div>
                  <div class="footer_links_container">
                    <ul>
                      <li><a href="#">Terms of Use</a></li>
                      <li><a href="#">Privacy Policy</a></li>
                    </ul>
                  </div>
                </div>
                
              </div>

            </div>
          </div>
        </div>
      </div>

      <div class="row copyright_row">
        <div class="col">
          <div class="copyright d-flex flex-lg-row flex-column align-items-center justify-content-start">
            <div class="cr_text">
              Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved
            </div>
            <div class="ml-lg-auto cr_links">
              Developed by <a href="https://banglasofttech.com" target="_blank">Bangla Soft Tech</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
</div>

<script src="<?php echo e(asset('content/js/jquery-3.2.1.min.js')); ?>"></script>
<script src="<?php echo e(asset('content/js/popper.js')); ?>"></script>
<script src="<?php echo e(asset('content/js/bootstrap.min.js')); ?>"></script>
<script src="<?php echo e(asset('content/js/ScrollMagic.min.js')); ?>"></script>
<script src="<?php echo e(asset('content/js/custom.js')); ?>"></script>
<script src="<?php echo e(asset('content/js/pdfobject.js')); ?>"></script>
<script src="<?php echo e(asset('content/plugin/videoPlugin/video.min.js')); ?>"></script>

<!-- <script type="text/javascript" src="<?php echo e(asset('content/js/jquery.js')); ?>"></script> -->
<!-- <script  type="text/javascript" src="<?php echo e(asset('content/js/jquery-ui.js')); ?>"></script> -->
<!-- <script type="text/javascript" src="<?php echo e(asset('content/js/jquery.min.js')); ?>"></script> -->
<!-- <script type="text/javascript" src="<?php echo e(asset('content/js/bootstrap.min.js')); ?>"></script> -->
<script type="text/javascript" src="<?php echo e(asset('content/js/main.js')); ?>"></script>
<!-- <script type="text/javascript" src="<?php echo e(asset('content/js/adminpanel.js')); ?>"></script> -->

<!-- Login Modal -->
<div class="modal fade" id="LoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="LoginModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="LoginModalLongTitle">Login</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
       <form method="post" action="<?php echo e(route('login')); ?>" role='login'>
        <div class="modal-body">
          <?php echo e(csrf_field()); ?>


          <?php if(count($errors) > 0): ?>
            <p class="bg-danger text-white text-center">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo e($error); ?>

                    <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
          <?php endif; ?>

          <div class="form-group">
            <label for="exampleInputEmail1">User Type</label>
            <h5 class="text-dark">
              <input type="radio" name="user_type" value="general_user" checked style="margin-left: 5px;"> Learner
              <input type="radio" name="user_type" value="author" style="margin-left: 5px;"> Trainer/Author/Teacher
              <input type="radio" name="user_type" value="corporate" style="margin-left: 5px;"> Corporate User
            </h5>
          </div>

          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Email"  required autofocus>
          </div>

          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required autofocus>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#RegistrationModal">Create new Account</button>
          <input type="submit" class="btn btn-success" value="Login">
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Login Reminder Model -->
<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modal" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
      </div>
      <div class="modal-body">
        Your free session has expired. Please login to continue.
      </div>
      <div class="modal-footer">
        <a href="/login" class="btn btn-primary">Login</a>
      </div>
    </div>
  </div>
</div>

<!-- Registration Modal -->
<div class="modal fade" id="RegistrationModal" tabindex="-1" role="dialog" aria-labelledby="RegistrationModalTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title" id="RegistrationModalTitle">Registration</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <form class="form-group" method="POST" action="<?php echo e(route('register')); ?>" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

      <div class="modal-body">
            <div class="row">
                <div class="col-lg-6">
                      <div class="form-group">
                          <label for="Moto">User Type</label><br>
                           <select class="form-control" id="selected_user_type" name="user_type" required autofocus>
                              <option value="" selected disabled>--Select User Type--</option>
                              <option value="author">Trainer/Author/Teacher</option>
                              <option value="learner">Learner</option>
                              <option value="corporate">Corporate User</option>
                          </select>
                      </div>
                     <div class="form-group">
                        <label for="first_name">First Name</label><br>
                        <input type="text" class="form-control" name="first_name" placeholder="Enter First Name"  required autofocus>
                    </div>
                     <div class="form-group">
                        <label for="last_name">Last Name</label><br>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name"  required autofocus>
                    </div>
                     <div class="form-group">
                        <label for="email">Email</label><br>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email" required autofocus>
                    </div>
                     <div class="form-group">
                        <label for="address">Address</label><br>
                        <input type="text" class="form-control" name="address" placeholder="Enter Address"  required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label><br>
                        <?php echo $__env->make('country', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Phone">Phone</label><br>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number"  required autofocus>
                    </div>
                    <div class="form-group" id="occupation">
                        <label for="occupation">Occupation</label><br>
                        <input type="text" class="form-control" name="occupation" placeholder="Enter Occupation">
                    </div>
                    <div class="form-group" id="organization">
                        <label for="organization">Organization</label><br>
                        <input type="text" class="form-control" name="organization" placeholder="Enter Organization">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label><br>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password"  required autofocus>
                    </div>
                    <div class="form-group">
                        <label for="password">Password Again</label><br>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Password Again"  required autofocus>
                    </div>
                     <div class="form-group" id="picture">
                        <label for="picture">Profile Picture</label><br>
                        <input type="file" class="form-control" name="picture" accept="image/x-png,image/gif,image/jpeg">
                    </div>
                </div>
            </div>
      </div>
      <div class="modal-footer">
        <input type="submit" class="btn btn-success" value='Register'/>
      </div>
  </form>
    </div>
  </div>
</div>

</body>
</html>





