@extends('layouts.layout')

@section('title', $course->title)

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('content/style/course.css')}}">
  
  <div class="course">
    <div class="container">
      <div class="row">
        <!-- Course -->
        <div class="col-lg-8">
          <div class="course_container">
            <div class="course_title">{{ $course->title }}</div>
            <div class="course_info d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">

              <!-- Course Info Item -->
              <div class="course_info_item">
                <div class="course_info_title">Trainer:</div>
                <div class="course_info_text"><a href="{{asset('courses/author/'.$author->email)}}">{{ $author->first_name }} {{ $author->last_name }}</a></div>
              </div>

              <!-- Course Info Item -->
              <div class="course_info_item">
                <div class="course_info_title">Duration:</div>
                <div class="course_info_text">{{ $course->duration }} {{ $course->duration_type }}</div>
              </div>

              <div class="course_info_item">
                <div class="course_info_title">Fee:</div>
                <div class="course_info_text">
                  @if($course->course_fee>0)
                    ${{ $course->course_fee }}
                  @else
                    Free
                  @endif
                </div>
              </div>

              <!-- Course Info Item -->
              <div class="course_info_item">
                <div class="course_info_title">Category:</div>
                <div class="course_info_text"><a href="{{asset('courses/catagory/'.$category->id)}}">{{ $category->catagory_name }}</a></div>
              </div>

              

            </div>

            <!-- Course Image -->
            <div class="course_image">
                <img src="{{asset('/storage/thumbnail/course/'.$course->thumbnail)}}" alt="">
                </div>

            <!-- Course Tabs -->
            <div class="course_tabs_container">
              <div class="tabs d-flex flex-row align-items-center justify-content-start">
                <div class="tab active">Description</div>
                <div class="tab">Books</div>
                <div class="tab">Videos</div>
                <div class="tab">PPT</div>
                <div class="tab">Reference</div>
                <div class="tab">Instruction</div>
                <div class="tab">Question</div>
              </div>
              
              <div class="tab_panels">

                <!-- Description -->
                <div class="tab_panel active">
                  <div class="tab_panel_title">Introduction</div>
                  <div class="tab_panel_content">
                    <div class="tab_panel_text">
                      <p>{{ $course->introduction_text }}</p>

                        

                        @if($file_ext=='mp4')
                          <video class="blog_post_video video-js" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": ""}'>
                            <source src="{{asset('/storage/files/course/introduction_files/'.$course->introduction_file)}}" type="video/mp4">
                            Your browser does not support HTML5 video.
                          </video>
                        @elseif($file_ext=='pdf')
                            <div class="dropdown_item_title"><a class="book_file" file="{{$course->introduction_file}}" link="{{asset('/storage/files/course/introduction_files/'.$course->introduction_file)}}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  View study instruction file</a></div>
                        @elseif($file_ext=='ppt')
                            <div class="dropdown_item">
                              <div class="dropdown_item_title"><a data-toggle="modal" class="ppt_file" file="{{$course->introduction_file}}" link="{{asset('/storage/files/course/introduction_files/'.$course->introduction_file)}}" data-target="#examplePPTCenter"><i class="fa fa-list-alt" aria-hidden="true"></i>   View study instruction file</a></div>
                            </div>
                        @endif
                    </div>

                    <div class="tab_panel_section">
                      <div class="tab_panel_title">Outcome</div>
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

                <!-- Books -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">Books</div>
                    <div class="tab_panel_content">

                      <!-- Files -->
                      <ul class="dropdowns">
                        @foreach($book_files as $book_file)
                          @if($book_file)
                          <li>
                            <div class="dropdown_item">
                              <div class="dropdown_item_title"><a class="book_file" file="{{$book_file}}" link="{{asset('/storage/files/course/books/'.$book_file)}}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  {{ $book_file }}</a></div>
                            </div>
                          </li>
                          @endif
                        @endforeach
                        
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- Videos -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">Videos</div>
                    <div class="tab_panel_content">

                      <!-- Files -->
                      <ul class="dropdowns">
                        @foreach($video_files as $video_file)
                          @if($video_file)
                          <li>
                            <div class="dropdown_item">
                              <div class="dropdown_item_title"><a data-toggle="modal" class="video_file" file="{{$video_file}}" link="{{asset('/storage/files/course/videos/'.$video_file)}}" data-target="#exampleVideoCenter"><i class="fa fa-youtube-play" aria-hidden="true"></i>  {{ $video_file }}</a></div>
                            </div>
                          </li>
                          @endif
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>

                <!-- PPT -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">PPT</div>
                    <div class="tab_panel_content">

                      <!-- Files -->
                      <ul class="dropdowns">
                        @foreach($ppt_files as $ppt_file)
                          @if($ppt_file)
                          <li>
                            <div class="dropdown_item">
                              <div class="dropdown_item_title"><a data-toggle="modal" class="ppt_file" file="{{$ppt_file}}" link="{{asset('/storage/files/course/ppts/'.$ppt_file)}}" data-target="#examplePPTCenter"><i class="fa fa-list-alt" aria-hidden="true"></i>  {{ $ppt_file }}</a></div>
                            </div>
                          </li>
                          @endif
                        @endforeach
                      </ul>
                    </div>
                  </div>
                </div>
                
                <!-- Reference -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">Books</div>
                    <div class="tab_panel_content">
                      
                      @foreach($book_links as $book_link)
                        @if($book_link)
                          <div class="ext_link"><i class="fa fa-chrome" aria-hidden="true"></i>  <a href="http://{{$book_link}}">{{$book_link}}</a></div>
                        @endif
                      @endforeach
                        
                    </div>


                    <div class="tab_panel_title">Videos</div>
                    <div class="tab_panel_content">

                      @foreach($video_links as $video_link)
                        @if($video_link)
                          <div class="ext_link"><i class="fa fa-chrome" aria-hidden="true"></i>  <a href="http://{{$video_link}}">{{$video_link}}</a></div>
                        @endif
                      @endforeach
                      
                    </div>

                    <div class="tab_panel_title">PPT</div>
                      <div class="tab_panel_content">

                      @foreach($ppt_links as $ppt_link)
                        @if($ppt_link)
                          <div class="ext_link"><i class="fa fa-chrome" aria-hidden="true"></i>  <a href="http://{{$ppt_link}}">{{$ppt_link}}</a></div>
                        @endif
                      @endforeach
                      
                    </div>
                  </div>
                </div>

                <!-- Instruction -->
                <div class="tab_panel">
                  @for($i=1;$i<=$duration;$i++)
                  <div class="tab_panel_title">Session {{$i}}</div>
                  <div class="tab_panel_content">
                    <div class="tab_panel_text">
                      <p>{{$instructions[$i-1]}}</p>
                    </div>
                  </div>
                  @endfor
                </div>

                <!-- Questions -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">Exam Questions</div>
                    <div class="tab_panel_content">

                      <!-- Files -->
                      <ul class="dropdowns">
                        @foreach($exam_files as $exam_file)
                          @if($exam_file)
                          <li>
                            <div class="dropdown_item">
                              <div class="dropdown_item_title"><a class="book_file" file="{{$exam_file}}" link="{{asset('/storage/files/course/examfiles/'.$exam_file)}}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  {{ $exam_file }}</a></div>
                            </div>
                          </li>
                          @endif
                        @endforeach
                        
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Course Sidebar -->
        <div class="col-lg-4">
          <div class="sidebar">

              <!-- Feature -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Trainer</div>
                <div class="sidebar_teacher">
                  <div class="teacher_title_container d-flex flex-row align-items-center justify-content-start">
                    <div class="teacher_image">
                        <img src="{{asset('/storage/thumbnail/author/'.$author->pp)}}" alt="">
                        </div>
                    <div class="teacher_title">
                      <div class="teacher_name"><a href="{{asset('courses/author/'.$author->email)}}">{{ $author->first_name }} {{ $author->last_name }}</a></div>
                      <div class="teacher_position">{{$author->occupation}} at {{$author->organization}}</div>
                    </div>
                  </div>
                  <div class="teacher_info">
                    <p>{{$course->trainer_description}}</p>
                  </div>
                </div>
              </div>

              <!-- Related Content Section -->
              <div class="sidebar_section">
                <div class="sidebar_section_title">Related Courses</div>
                <div class="sidebar_latest">
                  @foreach($related_courses as $related_course)
                    <div class="latest d-flex flex-row align-items-start justify-content-start">
                      <div class="latest_image"><div><img src="{{asset('/storage/thumbnail/course/'.$related_course->thumbnail)}}" alt="Icon"></div></div>
                      <div class="latest_content">
                        <div class="latest_title"><a href="{{asset('courses/view/'.$related_course->id)}}">{{ $related_course->title }}</a></div>
                        <div class="course_author">
                          @if($related_course->course_fee>0)
                            ${{$related_course->course_fee}}
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

<!-- Book -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleBookCenterTitle">Book: Lorem Ipsn gravida nibh vel velit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe class="pdf_viewer" src="http://docs.google.com/gview?embedded=true&url=https://desinnet.myblog.it/media/00/02/282529104.ppt" width="100%" style="height:600px;" frameborder="0">
            </iframe> 
      </div>
    </div>
  </div>
</div>

<!-- Video -->
<div class="modal fade" id="exampleVideoCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleVideoCenterTitle">Video: Lorem Ipsn gravida nibh vel velit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <video class="blog_post_video video-js" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": ""}'>
          <source class="video_source" src="/content/image/mov_bbb.mp4" type="video/mp4">
          Your browser does not support HTML5 video.
        </video>
      </div>
    </div>
  </div>
</div>

<!-- PPT -->
<div class="modal fade" id="examplePPTCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="examplePPTCenterTitle">PPT: Lorem Ipsn gravida nibh vel velit</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <iframe class="ppt_viewer" src="https://view.officeapps.live.com/op/embed.aspx?src=https://www.microarch.org/micro37/presentations/slides-198.ppt" width="100%" style="height:550px;" frameborder="0">
            </iframe> 
      </div>
    </div>
  </div>
</div>
