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
            <div class="course_title">{{$training->title}}</div>
            <div class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

              <!-- Course Info Item -->
              <div class="course_info_item">
                <div class="course_info_title">Trainer:</div>
                <div class="course_info_text"><a href="{{asset('training/author/'.$training->uploader_email)}}">{{$author->first_name}} {{$author->last_name}}</a></div>
              </div>

              <!-- Course Info Item -->
              <div class="course_info_item">
                <div class="course_info_title">Uploaded On:</div>
                <div class="course_info_text">{{$training->created_at}}</div>
              </div>

              <div class="course_info_item">
                <div class="course_info_title">Fee:</div>
                <div class="course_info_text">
                  @if($training->fee>0)
                    ${{$training->fee}}
                  @else
                    Free
                  @endif
                </div>
              </div>

              <!-- Course Info Item -->
              <div class="course_info_item">
                <div class="course_info_title">Category:</div>
                <div class="course_info_text"><a href="{{asset('training/catagory/'.$training->catagory_id)}}"> {{$training->catagory_name}}</a></div>
              </div>

            </div>
          </div>

            <!-- training Player -->
           <video class="blog_post_video video-js" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": "{{asset('/storage/thumbnail/training/'.$training->thumbnail)}}"}'>
              <source src="{{asset('/storage/files/training/'.$training->file)}}" type="video/mp4">
              Your browser does not support HTML5 training.
            </video>

            <div class="tab_panel_section">
              <div class="tab_panel_title">Description</div>
              <div class="tab_panel_text">
                <p>{{ $training->description }}</p>
              </div>
            </div>

          </div>          
      
        <!-- Course Sidebar -->
        <div class="col-lg-4">
          <div class="sidebar">
            
              <!-- Author Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Trainer</div>
                <div class="sidebar_teacher">
                  <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                    <div class="teacher_image">
                        <img src="{{asset('/storage/thumbnail/author/'.$author->pp)}}" alt="">
                        </div>
                    <div class="teacher_title">
                      <div class="teacher_name"><a href="{{asset('training/author/'.$training->uploader_email)}}">{{$author->first_name}} {{$author->last_name}}</a></div>
                      <div class="teacher_position">{{$author->occupation}} at {{$author->organization}}</div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Related Content Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Related Trainings</div>
                <div class="sidebar_latest">
                  @foreach($related_trainings as $related_training)
                    <div class="latest d-flex flex-row align-items-start justify-content-start">
                      <div class="latest_image"><div><img src="{{asset('/storage/thumbnail/training/'.$related_training->thumbnail)}}" alt="Icon"></div></div>
                      <div class="latest_content">
                        <div class="latest_title"><a href="{{asset('training/view/'.$related_training->id)}}">{{ $related_training->title }}</a></div>
                        <div class="course_author">
                          @if($related_training->fee>0)
                            ${{$related_training->fee}}
                          @else
                            Free
                          @endif
                        </div>
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
