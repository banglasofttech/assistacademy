@extends('layouts.layout')

@section('title', $training->title)

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('content/style/course.css')}}">
  
  <div class="course">
    <div class="container">
      <div class="row">
        <!-- Course -->
        <div class="col-lg-8">
          <div class="course_container">
            <div class="title">{{ $training->title }}</div>

            <div class="row content_short_info">

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Trainer:</div>
                <div class="course_info_text"><a href="{{asset('author/'.$author->id)}}">{{ $author->first_name }} {{ $author->last_name }}</a></div>
              </div>

              <!-- Course Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Duration:</div>
                <div class="course_info_text">{{ $training->duration }} {{ $training->duration_type }}</div>
              </div>

              <div class="col-lg-3">
                <div class="course_info_title">Fee:</div>
                <div class="course_info_text">
                  @if($training->fee>0)
                    ${{ $training->fee }}
                  @else
                    Free
                  @endif
                </div>
              </div>

              <!-- Training Info Item -->
              <div class="col-lg-3">
                <div class="course_info_title">Category:</div>
                <div class="course_info_text"><a href="{{asset('training/catagory/'.$training->catagory_id)}}">{{ $catagory_name->catagory_name }}</a></div>
              </div>

              

            </div>

            <!-- Course Image -->
            <div class="course_banner">
                <img src="{{asset('/storage/thumbnail/training/'.$training->thumbnail)}}" alt="">
            </div>

            <!-- Course Tabs -->
            <div class="course_tabs_container">
              <div class="tabs">
                <div class="tab active">Description</div>
                <div class="tab">Videos</div>
                <div class="tab">PPT</div>
                <div class="tab">Comments</div>
                <div class="tab">Review</div>
              </div>
              
              <div class="tab_panels">

                <!-- Description -->
                <div class="tab_panel active">
                  <div class="tab_panel_title">Introduction</div>
                  <div class="tab_panel_content">
                    <div class="tab_panel_text">
                      <p>{{ $training->introduction_text }}</p>

                        @if($file_ext=='mp4')
                          <video class="blog_post_video video-js" data-setup='{"controls": true, "autoplay": false, "preload": "auto", "poster": ""}'>
                            <source src="{{asset('/storage/files/training/introduction_files/'.$training->introduction_file)}}" type="video/mp4">
                            Your browser does not support HTML5 video.
                          </video>
                        @elseif($file_ext=='pdf')
                            <div class="dropdown_item_title"><a class="book_file" file="{{$training->introduction_file}}" link="{{asset('/storage/files/training/introduction_files/'.$training->introduction_file)}}" data-toggle="modal" data-target="#exampleModalCenter"><i class="fa fa-file-pdf-o" aria-hidden="true"></i>  View study instruction file</a></div>
                        @elseif($file_ext=='ppt')
                            <div class="dropdown_item">
                              <div class="dropdown_item_title"><a data-toggle="modal" class="ppt_file" file="{{$training->introduction_file}}" link="{{asset('/storage/files/training/introduction_files/'.$training->introduction_file)}}" data-target="#examplePPTCenter"><i class="fa fa-list-alt" aria-hidden="true"></i>   View study instruction file</a></div>
                            </div>
                        @endif
                    </div>

                    <div class="tab_panel_section">
                      <div class="tab_panel_title">Objective</div>
                      <ul class="tab_panel_bullets">
                        @foreach($objectives as $objective)
                          @if($objective)
                            <li>{{ $objective }}</li>
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

                <!-- Comments -->
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_title">Comments ({{ $total_comment }})</div>
                    <div class="tab_panel_content">


                          <div class="col-sm-12 review-block">
                            <form class="panel-body" method="POST" action="{{route('comment')}}">
                              {{csrf_field()}}

                              <input type="hidden" name="content_id" value="{{ $training->id }}">
                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <input type="hidden" name="type" value="training">
                              <div class="form-group">
                                <textarea name="comment" placeholder="Enter your comment" class="form-control" required></textarea>
                              </div>
                              <input class="btn btn-success" type="submit" value="Submit">

                            </form>
                          </div> 

                          <?php $i =0 ?>
                          @foreach($all_comment as $comment)
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="review-block">
                                <div class="row">
                                  <div class="col-sm-3">
                                    @if($commented_users[$i]->pp != null)
                                        <img src="{{asset('/storage/thumbnail/author/'.$commented_users[$i]->pp)}}" class="img-rounded" width="60px" height: "200px">
                                      @else
                                        <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded"  width="50px" height: "250px">
                                      @endif
                                    <div class="review-block-name"> {{ $commented_users[$i]->first_name }} {{ $commented_users[$i]->last_name }}</div>
                                    <div class="review-block-date"> {{$comment->created_at }}</div>
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="review-block-description">{{ $comment->comment }}</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php $i++ ?>
                          @endforeach

                          <a class="btn btn-primary btn-block" href="{{asset('training/comment/'.$training->id)}}">View All Comments</a>
                        
                    </div>
                  </div>
                </div>

                <!-- Reviews -->
               <link rel="stylesheet" type="text/css" href="{{asset('content/style/review.css')}}">
                <div class="tab_panel tab_panel_2">
                  <div class="tab_panel_content">
                    <div class="tab_panel_content">

                        <div class="">
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="rating-block">
                                <h4>Average Rating</h4>
                                <h2 class="bold padding-bottom-7"> {{ sprintf('%0.1f',$avg_rating) }} <small>/ 5</small></h2>
                                
                              </div>
                            </div>
                            <div class="col-sm-6 rating-block">
                              <h4 style="margin-bottom: 10px">Rating breakdown</h4>
                              <div class="pull-left">
                                <div class="pull-left" style="width:35px; line-height:1;">
                                  <div style="height:9px; margin:5px 0;">5 <span class="fa fa-star"></span></div>
                                </div>
                                <div class="pull-left" style="width:180px;">
                                  <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar bg-success" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="5" style="width: 1000%">
                                    </div>
                                  </div>
                                </div>
                                <div class="pull-right" style="margin-left:10px;">{{ $star5 }}</div>
                              </div>
                              <div class="pull-left">
                                <div class="pull-left" style="width:35px; line-height:1;">
                                  <div style="height:9px; margin:5px 0;">4 <span class="fa fa-star"></span></div>
                                </div>
                                <div class="pull-left" style="width:180px;">
                                  <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar bg-primary" role="progressbar" aria-valuenow="4" aria-valuemin="0" aria-valuemax="5" style="width: 80%">
                                    </div>
                                  </div>
                                </div>
                                <div class="pull-right" style="margin-left:10px;">{{ $star4 }}</div>
                              </div>
                              <div class="pull-left">
                                <div class="pull-left" style="width:35px; line-height:1;">
                                  <div style="height:9px; margin:5px 0;">3 <span class="fa fa-star"></span></div>
                                </div>
                                <div class="pull-left" style="width:180px;">
                                  <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar bg-info" role="progressbar" aria-valuenow="3" aria-valuemin="0" aria-valuemax="5" style="width: 60%">
                                    </div>
                                  </div>
                                </div>
                                <div class="pull-right" style="margin-left:10px;">{{ $star3 }}</div>
                              </div>
                              <div class="pull-left">
                                <div class="pull-left" style="width:35px; line-height:1;">
                                  <div style="height:9px; margin:5px 0;">2 <span class="fa fa-star"></span></div>
                                </div>
                                <div class="pull-left" style="width:180px;">
                                  <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar bg-warning" role="progressbar" aria-valuenow="2" aria-valuemin="0" aria-valuemax="5" style="width: 40%">
                                    </div>
                                  </div>
                                </div>
                                <div class="pull-right" style="margin-left:10px;">{{ $star2 }}</div>
                              </div>
                              <div class="pull-left">
                                <div class="pull-left" style="width:35px; line-height:1;">
                                  <div style="height:9px; margin:5px 0;">1 <span class="fa fa-star"></span></div>
                                </div>
                                <div class="pull-left" style="width:180px;">
                                  <div class="progress" style="height:9px; margin:8px 0;">
                                    <div class="progress-bar bg-danger" role="progressbar" aria-valuenow="1" aria-valuemin="0" aria-valuemax="5" style="width: 20%">
                                    </div>
                                  </div>
                                </div>
                                <div class="pull-right" style="margin-left:10px;">{{ $star1 }}</div>
                              </div>
                            </div>      
                          </div>    

                          @if($rated == null)

                          <div class="col-sm-12 review-block">
                            <form class="panel-body" method="POST" action="{{route('review')}}">
                              {{csrf_field()}}

                              <input type="hidden" name="content_id" value="{{ $training->id }}">
                              <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                              <input type="hidden" name="type" value="training">
                              <div class="form-group">

                                <label class="control-label" for="file_catagory" style="font-size: 18px; font-weight: bold;">Your Rating: </label>
                                <div class="rating">
                                  <input type="radio" name="rating" id="star5" value="5"> <label for="star5"></label>
                                  <input type="radio" name="rating" id="star4" value="4"> <label for="star4"></label>
                                  <input type="radio" name="rating" id="star3" value="3"> <label for="star3"></label>
                                  <input type="radio" name="rating" id="star2" value="2"> <label for="star2"></label>
                                  <input type="radio" name="rating" id="star1" value="1"> <label for="star1"></label>
                               </div>
                              </div>
                              <div class="form-group">
                                <label class="control-label" for="file_catagory">Review (optional)</label>
                                <textarea name="comment" placeholder="Enter your review" class="form-control"></textarea>
                              </div>
                              <input class="btn btn-success" type="submit" value="Submit">
                            </form>
                          </div>  

                          @endif
                          
                          <?php $i =0 ?>
                          @foreach($all_review as $review)
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="review-block">
                                <div class="row">
                                  <div class="col-sm-3">
                                      @if($reviewed_users[$i]->pp != null)
                                        <img src="{{asset('/storage/thumbnail/author/'.$reviewed_users[$i]->pp)}}" class="img-rounded" width="60px" height: "200px">
                                      @else
                                        <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded"  width="50px" height: "250px">
                                      @endif
                                    <div class="review-block-name"> {{ $reviewed_users[$i]->first_name }} {{ $reviewed_users[$i]->last_name }}</div>
                                    <div class="review-block-date"> {{$review->created_at }}</div>
                                  </div>
                                  <div class="col-sm-9">
                                    <div class="review-block-rate"> 
                                      @for($j = 0; $j < $review->rating; $j++)
                                        <span class="fa fa-star text-warning" aria-hidden="true"></span>
                                      @endfor
                                      @for($j = $review->rating; $j< 5; $j++)
                                        <span class="fa fa-star text-grey" aria-hidden="true"></span>
                                      @endfor
                                    </div>
                                    <div class="review-block-description">{{ $review->comment }}</div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                          <?php $i++ ?>
                          @endforeach

                          <a class="btn btn-primary btn-block" href="{{asset('training/review/'.$training->id)}}">View All Review</a>
                          
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
          <div class="sidebar">

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
                    <p>{{$training->trainer_description}}</p>
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
<script src="{{asset('content/js/review.js')}}"></script>

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
