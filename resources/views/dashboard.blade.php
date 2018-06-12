@extends('layouts.adminpanel')

@section('title', "My Panel")

@section('content_title', "Dashboard")

@section('content')

<div class="row">
    <div class="col-lg-3">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <h2>Books</h2>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h2>{{$total_books}}</h2>
                    </div>
                </div>
            </div>
            <a href="/managefiles/books">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <h2>PPTs</h2>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h2>{{$total_ppts}}</h2>
                    </div>
                </div>
            </div>
            <a href="/managefiles/ppts">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3">
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <h2>Videos</h2>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h2>{{$total_videos}}</h2>
                    </div>
                </div>
            </div>
            <a href="/managefiles/videos">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <h2>Training</h2>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h2>{{$total_training}}</h2>
                    </div>
                </div>
            </div>
            <a href="/managefiles/trainings">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    <div class="col-lg-3">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <h2>Courses</h2>
                    </div>
                    <div class="col-xs-9 text-right">
                        <h2>{{$total_courses}}</h2>
                    </div>
                </div>
            </div>
            <a href="/managefiles/courses">
                <div class="panel-footer">
                    <span class="pull-left">View Details</span>
                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>

    @if(Auth::user()->user_type=="admin")
        <div class="col-lg-3">
            <div class="panel panel-info">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-9">
                            Author<br>
                            <span class="" style="font-size: 25px;">Request</span>
                        </div>
                        <div class="col-xs-3 text-right">
                            <h2>{{$author_requests}}</h2>
                        </div>
                    </div>
                </div>
                <a href="/authorrequest">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-9">
                            Corporate<br>
                            <span class="" style="font-size: 25px;">Request</span>
                        </div>
                        <div class="col-xs-3 text-right">
                            <h2>{{$corporate_requests}}</h2>
                        </div>
                    </div>
                </div>
                <a href="/corporaterequest">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-9">
                             Learner <br>
                            <span class="" style="font-size: 25px;">Request</span>
                        </div>
                        <div class="col-xs-3 text-right">
                            <h2>{{$learner_requests}}</h2>
                        </div>
                    </div>
                </div>
                <a href="/learnerrequest">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <h2>Trainer</h2>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>{{$total_trainer}}</h2>
                        </div>
                    </div>
                </div>
                <a href="/authorlist">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <h2>Learner</h2>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>{{$total_learner}}</h2>
                        </div>
                    </div>
                </div>
                <a href="/learnerlist">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>

        <div class="col-lg-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-3">
                            <h2>Corporate</h2>
                        </div>
                        <div class="col-xs-9 text-right">
                            <h2>{{$total_corporate_user}}</h2>
                        </div>
                    </div>
                </div>
                <a href="/corporateuserlist">
                    <div class="panel-footer">
                        <span class="pull-left">View Details</span>
                        <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                        <div class="clearfix"></div>
                    </div>
                </a>
            </div>
        </div>
    @endif
</div>

@endsection