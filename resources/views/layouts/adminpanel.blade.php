<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Bootstrap Core CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('content/css/panel/bootstrap.min.css')}}">

    <!-- Custom CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('content/css/panel/sb-admin-2.css')}}">

    <link rel="stylesheet" type="text/css" href="{{asset('content/css/main.css')}}">

    <!-- Custom Fonts -->
    <link rel="stylesheet" type="text/css" href="{{asset('content/css/panel/font-awesome/css/font-awesome.min.css')}}">

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
                <a class="navbar-brand text-primary" href="/mypanel">
                    @if(Auth::user()->user_type=="admin")
                        Assist Academy (Admin Panel)
                    @else
                        Assist Academy (Author Panel)
                    @endif
                </a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li>
                            <a class="btn btn-outline-light btn-sm" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            <i class="fa fa-sign-out fa-fw"></i> Logout</a> 
                            <form action="{{ route('logout') }}" id="logout-form" method="post">
                                {{ csrf_field() }}
                            </form>
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
                            <a href="{{asset('/')}}"><i class="fa fa-home fa-fw"></i> Assist Academy Home</a>
                        </li>
                        <li>
                            <a href="{{asset('/mypanel')}}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-files-o fa-fw"></i> Manage Files<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="{{asset('/managefiles/books')}}">Books</a>
                                </li>
                                <li>
                                    <a href="{{asset('/managefiles/ppts')}}">PPTs</a>
                                </li>
                                <li>
                                    <a href="{{asset('/managefiles/videos')}}">Videos</a>
                                </li>
                                <li>
                                    <a href="{{asset('/managefiles/trainings')}}">Training Files</a>
                                </li>
                                <li>
                                    <a href="{{asset('/managefiles/courses')}}">Courses</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="{{asset('/searchauthor')}}"><i class="fa fa-search fa-fw"></i> Search Authors</a>
                        </li>
                        <li>
                            <a href="{{asset('/upload')}}"><i class="fa fa-edit fa-fw"></i> Upload Files</a>
                        </li>
                        <li>
                            <a href="{{asset('/addtraining')}}"><i class="fa fa-plus-circle fa-fw"></i> Add Training</a>
                        </li>
                        <li>
                            <a href="{{asset('/addcourse')}}"><i class="fa fa-plus-circle fa-fw"></i> Add Course</a>
                        </li>
                        @if(Auth::user()->user_type=="admin")
                            <li>
                                <a href="#"><i class="fa fa-check-square-o fa-fw"></i> User Request<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{asset('authorrequest')}}">Author Request</a>
                                    </li>
                                    <li>
                                        <a href="{{asset('corporaterequest')}}">Corporate User Request</a>
                                    </li>
                                    <li>
                                        <a href="{{asset('learnerrequest')}}">Learner Request</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-user fa-fw"></i> Manage Members<span class="fa arrow"></span></a>
                                <ul class="nav nav-second-level">
                                    <li>
                                        <a href="{{asset('/authorlist')}}">Author/Trainer</a>
                                    </li>
                                    <li>
                                        <a href="{{asset('/learnerlist')}}">Learner</a>
                                    </li>
                                    <li>
                                        <a href="{{asset('/corporateuserlist')}}">Corporate Member</a>
                                    </li>
                                </ul>
                                <!-- /.nav-second-level -->
                            </li>
                        @endif
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        @if (count($errors) > 0)
          <div class="bg-danger text-dabger text-center" style="font-size: 25px;">
              @foreach($errors->all() as $error)
                  {{$error}}
                  <br>
              @endforeach
          </div>
        @endif

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">@yield('content_title')</h1>
                </div>
            </div>
            
            <div class="row">
                @yield('content')
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- Other part -->
    <div class="modal fade" id="add-catagory-modal" tabindex="-1" role="dialog" aria-labelledby="add-catagory-modal-title" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="add-catagory-modal-title">New Category</h5>
          </div>
          <form class="form-group" method="POST" action="{{route('addcatagory')}}">
            {{csrf_field()}}
              <div class="modal-body">
                <div class="form-group">
                    <label for="catagory">Category Name</label><br>
                    <input type="text" class="form-control" name="catagory_name" placeholder="Enter Category Name" required autofocus='true'>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <input type="submit" class="btn btn-primary" value="Add Category">
              </div>
          </form>
        </div>
      </div>
    </div>

    <!-- jQuery -->
    <script type="text/javascript" src="{{asset('content/js/panel/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script type="text/javascript" src="{{asset('content/js/panel/bootstrap.min.js')}}"></script>
    
    <!-- Metis Menu Plugin JavaScript -->
    <script type="text/javascript" src="{{asset('content/js/panel/metisMenu.min.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script type="text/javascript" src="{{asset('content/js/panel/sb-admin-2.js')}}"></script>
    <script type="text/javascript" src="{{asset('content/js/adminpanel.js')}}"></script>
    <script type="text/javascript" src="{{asset('content/js/main.js')}}"></script>

</body>

</html>
