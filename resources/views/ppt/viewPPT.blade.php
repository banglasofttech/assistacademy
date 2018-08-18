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
            <div class="title">{{$ppt->file_name}}</div>
            <div class="row content_short_info">

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Uploaded By:</div>
                <div class="course_info_text"><a href="{{asset('author/'.$author->id)}}">{{$author->first_name}} {{$author->last_name}}</a></div>
              </div>

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Uploaded On:</div>
                <div class="course_info_text">{{$ppt->created_at}}</div>
              </div>

              <div class="col-lg-3">
                <div class="course_info_title">Views:</div>
                <div class="course_info_text">{{$ppt->total_view}}</div>
              </div>

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Category:</div>
                <div class="course_info_text"><a href="{{asset('ppts/catagory/'.$ppt->catagory_id)}}"> {{$ppt->catagory_name}}</a></div>
              </div>

            </div>
          </div>
            <!-- PPT Viewer -->
            <!--<iframe class="ppt_viewer" src="https://drive.google.com/viewerng/viewer?url=https://desinnet.myblog.it/media/00/02/282529104.ppt&hl=en&pid=explorer&efh=false&a=v&chrome=false&embedded=true" width="100%" style="height:560px;" frameborder="0">-->
            <!--</iframe> -->
            
            <iframe class="ppt_viewer" src="https://view.officeapps.live.com/op/embed.aspx?src={{asset('storage/files/ppts/'.$ppt->file)}}" width="100%" style="height:560px;" frameborder="0">
            </iframe> 

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
                <div class="sidebar_section_title">Related PPTs</div>
                <div class="sidebar_latest">
                  @foreach($related_ppts as $related_ppt)
                    <div class="latest d-flex flex-row align-items-start justify-content-start">
                      <div class="latest_image"><div>
                          <img src="{{asset('/storage/thumbnail/ppts/'.$related_ppt->thumbnail)}}" alt="Icon">
                          </div></div>
                      <div class="latest_content">
                        <div class="latest_title"><a href="{{asset('ppts/view/'.$related_ppt->id)}}">{{ $related_ppt->file_name }}</a></div>
                        <div class="course_author">{{ $related_ppt->author }}</div>
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
