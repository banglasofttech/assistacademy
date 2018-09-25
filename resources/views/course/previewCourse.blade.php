@extends('layouts.layout')

@section('title', $course->title)

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('content/style/course.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('content/style/review.css')}}">

  <div class="course">
    <div class="container">
      <div class="row">
        <!-- Course -->
        <div class="col-lg-8">
          <div class="course_container">
            <div class="title">{{ $course->title }}</div>

            <div class="row content_short_info">

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Trainer:</div>
                <div class="course_info_text"><a href="{{asset('author/'.$author->id)}}">{{ $author->first_name }} {{ $author->last_name }}</a></div>
              </div>

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Duration:</div>
                <div class="course_info_text">{{ $course->duration }} {{ $course->duration_type }}</div>
              </div>

              <div class="col-lg-3">
                <div class="course_info_title">Fee:</div>
                <div class="course_info_text">
                  @if($course->course_fee>0)
                    ${{ $course->course_fee }}
                  @else
                    Free
                  @endif
                </div>
              </div>

              <!-- Training Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Rating:</div>
                <div class="course_info_text"><h4>{{ sprintf('%0.1f',$avg_rating) }}  / <small>5</small></h4></div>
              </div>

            </div>

            <!-- Course Tabs -->
            <div class="course_tabs_container">
              
              <div class="tab_panels" style="width: 100%">

                <!-- Description -->
                <div class="tab_panel active">
                  <div class="tab_panel_title">Introduction</div>
                  <div class="tab_panel_content">
                    <div class="tab_panel_text">
                      <p>{{ $course->introduction_text }}</p>
                    </div>

                    <div class="tab_panel_section">
                      <div class="tab_panel_title">Objective</div>
                      <ul class="tab_panel_bullets">
                        @foreach($outcomes as $outcome)
                          @if($outcome)
                            <li>{{ $outcome }}</li>
                          @endif
                        @endforeach
                      </ul>
                    </div>

                    <div class="tab_panel_section">
                      <div class="tab_panel_title">Description</div>
                        <div class="tab_panel_text">
                          <p>{{ $course->description }}</p>
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4">
          <div class="sidebar" style="padding-top: 15px;">

              <!-- Related Content Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Short Description</div>
                <div class="sidebar_latest">
                  @if($file_ext=='mp4')
                      <video class="blog_post_video video-js" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": ""}'>
                        <source src="{{asset('/storage/files/course/introduction_files/'.$course->introduction_file)}}" type="video/mp4">
                        Your browser does not support HTML5 video.
                      </video>
                    @elseif($file_ext=='pdf')
                        <iframe class="pdf_viewer" src="http://docs.google.com/gview?embedded=true&url={{asset('/storage/files/course/introduction_files/'.$course->introduction_file)}}" width="100%" style="height:250px;" frameborder="0">
                        </iframe> 
                    @elseif($file_ext=='ppt')
                        <iframe class="ppt_viewer" src="https://view.officeapps.live.com/op/embed.aspx?src={{asset('/storage/files/courses/introduction_files/'.$course->introduction_file)}}" width="100%" style="height:250px;" frameborder="0">
                        </iframe>
                    @endif

                    <a class="btn btn-success btn-block" href="{{asset('courses/view/'.$course->id )}}" style="font-size: 20px; font-weight: bold; margin-top: 5px;">Get it Now</a>
                </div>
              </div>

              <!-- Feature -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Trainer</div>
                <div class="sidebar_teacher">
                  <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                    <div class="teacher_image">
                        <!-- <img src="{{asset('/storage/thumbnail/author/'.$author->pp)}}" alt=""> -->
                        <img src="{{asset('/storage/thumbnail/author/'.$author->pp)}}" alt="">
                        </div>
                    <div class="teacher_title">
                      <div class="teacher_name"><a href="{{asset('author/'.$author->id)}}">{{ $author->first_name }} {{ $author->last_name }}</a></div>
                      <div class="teacher_position">{{$author->occupation}} at {{$author->organization}}</div>
                    </div>
                  </div>
                  <div class="teacher_info">
                    <p>{{$course->trainer_description}}</p>
                  </div>
                </div>
              </div>


          </div>
        </div>
      </div>
    </div>
  </div>
<script src="{{asset('content/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('content/js/course.js')}}"></script>
<script src="{{asset('content/js/review.js')}}"></script>

@endsection
