@extends('layouts.layout')

@section('title', $title)

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('content/style/course.css')}}">

  <div class="course">
    <div class="container">
      <div class="row">
        <!-- Course -->
        <div class="col-lg-8">
          <div class="course_container">
            <div class="title">{{$video->file_name}}</div>
            <div class="row content_short_info">

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Uploaded By:</div>
                <div class="course_info_text"><a href="{{asset('author/'.$author->id)}}">{{$author->first_name}} {{$author->last_name}}</a></div>
              </div>

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Uploaded On:</div>
                <div class="course_info_text">{{$video->created_at}}</div>
              </div>

              <div class="col-lg-3">
                <div class="course_info_title">Views:</div>
                <div class="course_info_text">{{$video->total_view}}</div>
              </div>

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Category:</div>
                <div class="course_info_text"><a href="{{asset('videos/catagory/'.$video->catagory_id)}}"> {{$video->catagory_name}}</a></div>
              </div>

            </div>
          </div>

            <!-- Video Player -->
           <video class="blog_post_video video-js" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": "{{asset('/storage/thumbnail/videos/'.$video->thumbnail)}}"}'>
              <source src="{{asset('/storage/files/videos/'.$video->file)}}" type="video/mp4">
              Your browser does not support HTML5 video.
            </video>

          </div>          
      
        <!-- Course Sidebar -->
        <div class="col-lg-4">
          <div class="sidebar">
            
              <!-- Author Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Uploaded by</div>
                <div class="sidebar_teacher">
                  <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                    <div class="teacher_image">
                        <img src="{{asset('/storage/thumbnail/author/'.$author->pp)}}" alt="">
                        </div>
                    <div class="teacher_title">
                      <div class="teacher_name"><a href="{{asset('author/'.$author->id)}}">{{$author->first_name}} {{$author->last_name}}</a></div>
                      <div class="teacher_position">{{$author->occupation}} at {{$author->organization}}</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Related Content Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Related Videos</div>
                <div class="sidebar_latest">
                  @foreach($related_videos as $related_video)
                    <div class="latest d-flex flex-row align-items-start justify-content-start">
                      <div class="latest_image"><div><img src="{{asset('/storage/thumbnail/videos/'.$related_video->thumbnail)}}" alt="Icon"></div></div>
                      <div class="latest_content">
                        <div class="latest_title"><a href="{{asset('videos/view/'.$related_video->id)}}">{{ $related_video->file_name }}</a></div>
                        <div class="course_author">{{ $related_video->author }}</div>
                      </div>
                    </div>
                  @endforeach

                </div>
              </div>

          </div>
        </div>
      </div>
    </div>
  </div>

<script src="{{asset('content/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('content/js/course.js')}}"></script>

@endsection
