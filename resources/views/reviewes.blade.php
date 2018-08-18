@extends('layouts.layout')

@section('title', $title)

@section('content')

<link rel="stylesheet" type="text/css" href="{{asset('content/style/course.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('content/style/review.css')}}">
  
  <div class="course">
    <div class="container">
      <div class="row">
        <!-- Course -->
        <div class="col-lg-8">
          <div class="course_container">
            <div class="course_title">{{ $title }}</div>

            <div class="course_tabs_container">
              <!-- Comments -->
              <div class="tab_panel tab_panel_2 active">
                <div class="tab_panel_content">
                  <div class="tab_panel_title">Review ({{ $total_review }})</div>
                  <hr>
                  <div class="tab_panel_content">
                      <?php $i =0 ?>
                      @foreach($all_review as $review)
                      <div class="row">
                        <div class="col-sm-12">
                          <div class="review-block">
                            <div class="row">
                              <div class="col-sm-3">
                                <img src="http://dummyimage.com/60x60/666/ffffff&text=No+Image" class="img-rounded">
                                <div class="review-block-name"> {{ $reviewed_users[$i]->first_name }} {{ $reviewed_users[$i]->last_name }}</div>
                                <div class="review-block-date"> {{$review->created_at }}</div>
                              </div>
                              <div class="col-sm-9">
                                <div class="review-block-rate"> 
                                  @for($j = 0; $j< $review->rating; $j++)
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

                    <div class="pagination">{{ $all_review->render() }}</div>
                      
                  </div>
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
@endsection