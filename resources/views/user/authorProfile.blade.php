@extends('layouts.layout')

@section('title', "Author")

@section('content')
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('content/style/author_profile.css')}}">

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
            <span class="card-title">{{ $title }}</span>
        </div>
        <div class="row d-flex justify-content-around contact_info text-light">
            <div class="col-lg-4 "><i class="text-warning fa fa-phone"></i> {{ $author->phone }}</div>
            <div class="col-lg-4 "><i class="text-warning fa fa-globe"></i> {{ $author->country }}</div>
            <div class="col-lg-4 "><i class="text-warning fa fa-envelope"></i> {{ $author->email }}</div> 
        </div>
    </div>
    <div class="row author_content btn-pref">
        <a class="col-lg-3 btn btn-primary btn-sm" href="#">Personal Information</a>
        <a class="col-lg-1 btn btn-default btn-sm" href="{{asset('books/author/'.$author->email)}}">Books</a>
        <a class="col-lg-2 btn btn-default btn-sm" href="{{asset('videos/author/'.$author->email)}}">Videos</a>
        <a class="col-lg-1 btn btn-default btn-sm" href="{{asset('ppts/author/'.$author->email)}}">PPTs</a>
        <a class="col-lg-2 btn btn-default btn-sm" href="{{asset('training/author/'.$author->email)}}">Training</a>
        <a class="col-lg-2 btn btn-default btn-sm" href="{{asset('courses/author/'.$author->email)}}">Courses</a>
        
    </div>

    <div class="personal_info text-dark">
        <b class="text-secondary">Address: </b> {{ $author->address }}
        <br>
        <b class="text-secondary">Occupation: </b> {{ $author->occupation }}
        <br>
        <b class="text-secondary">Organization: </b> {{ $author->organization }}
        <br>
        <b class="text-secondary">Joined at: </b> {{ $author->created_at }}

        <br><br>
        <b class="text-secondary">Books: </b> {{ $books }}
        <br>
        <b class="text-secondary">Videos: </b> {{ $videos }}
        <br>
        <b class="text-secondary">PPTs: </b> {{ $ppts }}
        <br>
        <b class="text-secondary">Training: </b> {{ $training}}
        <br>
        <b class="text-secondary">Courses: </b> {{ $courses }}
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

@endsection