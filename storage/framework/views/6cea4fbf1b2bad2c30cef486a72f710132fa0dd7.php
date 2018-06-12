<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $__env->yieldContent('title'); ?></title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/css/panel/bootstrap.min.css')); ?>">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/css/panel/sb-admin-2.css')); ?>">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('content/css/panel/font-awesome/css/font-awesome.min.css')); ?>">

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand text-primary" href="/adminpanel">Assist Academy (Author Panel)</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="/"><i class="fa fa-home fa-fw"></i> Assist Academy Home</a>
                        </li>
                        <li>
                            <a href="/adminpanel"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Manage Files<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/managefiles/books">Books</a>
                                </li>
                                <li>
                                    <a href="/managefiles/ppts">PPTs</a>
                                </li>
                                <li>
                                    <a href="/managefiles/ppts">Journal</a>
                                </li>
                                <li>
                                    <a href="/managefiles/videos">Training Files</a>
                                </li>
                                <li>
                                    <a href="/managefiles/videos">Courses</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="/searchauthor"><i class="fa fa-search fa-fw"></i> Search Authors</a>
                        </li>
                        <li>
                            <a href="/upload"><i class="fa fa-edit fa-fw"></i> Upload Files</a>
                        </li>
                        <li>
                            <a href="/authorrequest"><i class="fa fa-plus-circle fa-fw"></i> Add Course</a>
                        </li>
                        <li>
                            <a href="/authorrequest"><i class="fa fa-check-square-o fa-fw"></i> Author Request</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-user fa-fw"></i> Manage Members<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="/authorlist">Author/Trainer</a>
                                </li>
                                <li>
                                    <a href="/generaluserlist">Leraner</a>
                                </li>
                                <li>
                                    <a href="/corporatememberlist">Corporate Member</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header"><?php echo $__env->yieldContent('content_title'); ?></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script type="text/javascript" src="<?php echo e(asset('content/js/panel/jquery.min.js')); ?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="<?php echo e(asset('content/js/panel/bootstrap.min.js')); ?>"></script>
    
    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="<?php echo e(asset('content/js/panel/metisMenu.min.js')); ?>"></script>

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="<?php echo e(asset('content/js/panel/sb-admin-2.js')); ?>"></script>

</body>

</html>
