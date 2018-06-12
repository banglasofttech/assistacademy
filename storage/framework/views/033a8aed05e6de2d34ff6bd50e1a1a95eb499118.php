<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Sharif Noor Zisad">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Bootstrap core CSS -->
    <link href=<?php echo e(asset('content/css/bootstrap.css')); ?> rel="stylesheet">
    <link href=<?php echo e(asset('content/css/style.css')); ?> rel="stylesheet">
    <link href=<?php echo e(asset('content/css/jquery-ui.css')); ?> rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/css/main.css')); ?>">

    <?php if(auth()->guard()->guest()): ?>
      <input type="hidden" id="logincheck" value="guest">
    <?php else: ?>
      <input type="hidden" id="logincheck" value="logged">
    <?php endif; ?>

  </head>

  <body>
    <section class="d-flex justify-content-around bg-navigation-bar">
      <a href="/">Home</a>

      <li class="dropdown" style="list-style-type: none;">
        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">E-Learning</a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/#book-list">Book</a>
          <a class="dropdown-item" href="/#ppt-list">PPT</a>
          <a class="dropdown-item" href="/#journal-list">Journal</a>
        </div>
      </li>

      <a class="" href="/#video-list">Online Training/Video</a>
      <a class="" href="/#course-list">Course/Training</a>
      <a class="" href="#">Notice</a>
      <a class="" href="#">Contact</a>
    </section>

    <section>
      <img src="<?php echo e(asset('content/images/e-learning.jpg')); ?>" width="100%" height="200px" alt="Assist Academy">
    </section>

    <?php if(count($errors) > 0): ?>
      <div class="bg-danger text-white text-center" style="font-size: 25px;">
          <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php echo e($error); ?>

              <br>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>
    <?php endif; ?>

    <div class="d-flex bg-navigation-bar" style="margin-bottom: 50px;">      
      <section class="mr-auto p-2 ">
        <?php if(auth()->guard()->guest()): ?>
          <button type="button" class="btn btn-outline-light btn-sm author-login" href="#"  data-toggle="modal" data-target="#LoginModal">Login as Trainer/Author/Teacher</button>
          <button type="button" class="btn btn-outline-light btn-sm learner-login" href="#"  data-toggle="modal" data-target="#LoginModal">Login as Learner</button>
          <button type="button" class="btn btn-outline-light btn-sm corporate-login" href="#"  data-toggle="modal" data-target="#LoginModal">Login as Corporate</button>
          <button type="button" class="btn btn-outline-light btn-sm" href="#"  data-toggle="modal" data-target="#RegistrationModal">Register</button>
        <?php else: ?>
          <?php if(Auth::user()->user_type=="admin"|| Auth::user()->user_type=="author"): ?>
            <a class="btn btn-outline-light btn-sm" href="/mypanel">Go to your Panel</a>
          <?php elseif(Auth::user()->user_type=="learner"): ?>
            <button type="button" class="btn btn-outline-light btn-sm corporate-login" href="#"   data-toggle="modal" data-target="#AuthorRequestModal">Send Author/Trainer Request</button>
          <?php endif; ?>
          <a class="btn btn-outline-light btn-sm" href="<?php echo e(route('logout')); ?>"
                      onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Logout</a> 
          <form action="<?php echo e(route('logout')); ?>" id="logout-form" method="post">
            <?php echo e(csrf_field()); ?>

          </form>
        <?php endif; ?>
      </section>
      <section  class="p-2">
        <form method="POST"  class=" " action="<?php echo e(route('search')); ?>" enctype="multipart/form-data">
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="file_type" value="all-files">
            <input  type="name" class="flipkart-navbar-input" placeholder="What are you looking for?" id="file_name" name="file_name">
            <button type="submit" class="flipkart-navbar-button">
                <svg width="20px" height="15px">
                    <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
                </svg>
            </button>
          </form>
      </section>
    </div>

    <?php echo $__env->yieldContent('content'); ?>

    <div class="modal fade" id="AuthorRequestModal" tabindex="-1" role="dialog" aria-labelledby="AuthorRequestModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content col-md-10">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Send Author Request</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h6>Want to be an author/trainer? You may upload your paid or free books, training, presentations, add courses in your panel. Do you  want to send a request now?</h6> 
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <a class="btn btn-success" href="/sendauhtorrequest">Send Request</a>
          </div>
        </div>
      </div>
    </div>

    <div class="modal fade" id="LoginModal" tabindex="-1" role="dialog" aria-labelledby="LoginModalTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content col-md-8">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post" action="<?php echo e(route('login')); ?>" role='login'>
              <?php echo e(csrf_field()); ?>


              <?php if(count($errors) > 0): ?>
                <p class="bg-danger text-white text-center">
                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo e($error); ?>

                        <br>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </p>
              <?php endif; ?>

              <input type="hidden" id="user_type" name="user_type" value="author">
              <input type="email" name="email" placeholder="Email" required class="form-control input-lg" style="margin-bottom: 5px"/>   
              <input type="password" class="form-control input-lg" name="password" placeholder="Password" required="" />               
              <button type="submit" name="go" class="btn btn-lrg btn-success btn-block" style="margin-top: 10px">Login</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    

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
                        <input type="text" class="form-control" name="first_name" placeholder="Enter First Name" required>
                    </div>
                     <div class="form-group">
                        <label for="last_name">Last Name</label><br>
                        <input type="text" class="form-control" name="last_name" placeholder="Enter Last Name" required>
                    </div>
                     <div class="form-group">
                        <label for="email">Email</label><br>
                        <input type="email" class="form-control" name="email" placeholder="Enter Email"required>
                    </div>
                     <div class="form-group">
                        <label for="address">Address</label><br>
                        <input type="text" class="form-control" name="address" placeholder="Enter Address" required>
                    </div>
                    <div class="form-group">
                        <label for="country">Country</label><br>
                        <?php echo $__env->make('country', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Phone">Phone</label><br>
                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number" required>
                    </div>
                    <div class="form-group" id="occupation">
                        <label for="occupation">Occupation</label><br>
                        <input type="text" class="form-control" name="occupation" placeholder="Enter Occupation" >
                    </div>
                    <div class="form-group" id="organization">
                        <label for="organization">Organization</label><br>
                        <input type="text" class="form-control" name="organization" placeholder="Enter Organization">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label><br>
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password Again</label><br>
                        <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Password Again" required>
                    </div>
                     <div class="form-group" id="picture">
                        <label for="picture">Profile Picture</label><br>
                        <input type="file" class="form-control" name="picture" accept="image/x-png">
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




    <!-- Footer -->
    <!-- <section class="bg-navigation-bar" id="footer" style="margin-top: 50px;">
      <p>Assist Academy @ 2018 </p>
    </section> -->

    <!-- /.container -->
    <!-- Bootstrap core JavaScript -->
    <script type="text/javascript" src="<?php echo e(asset('content/js/jquery.js')); ?>"></script>
    <script  type="text/javascript" src="<?php echo e(asset('content/js/jquery-ui.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('content/js/jquery.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('content/js/bootstrap.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('content/js/main.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('content/js/adminpanel.js')); ?>"></script>

    


  </body>

</html>






