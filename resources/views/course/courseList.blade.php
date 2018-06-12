@extends('layouts.layout')

@section('title', $title." - Course")

@section('content_title', $title)

@section('content')
<div class="">

  <div class="item-panel bg-warning d-flex">
    <div class="mr-auto p-2">
      <font style="font-size: 25px; text-transform: uppercase;">{{$title}} <sub class="text-capitalize">(Course)</sub></font>
    </div>
    <div class="p-2 align-middle">
      <form method="POST"  class=" " action="{{ route('search') }}" enctype="multipart/form-data">
          {{ csrf_field() }}
          <input type="hidden" name="file_type" value="course">
          <input  type="name" class="flipkart-navbar-input" placeholder="Search Course" id="file_name" name="file_name">
          <button type="submit" class="flipkart-navbar-button">
              <svg width="20px" height="15px">
                  <path d="M11.618 9.897l4.224 4.212c.092.09.1.23.02.312l-1.464 1.46c-.08.08-.222.072-.314-.02L9.868 11.66M6.486 10.9c-2.42 0-4.38-1.955-4.38-4.367 0-2.413 1.96-4.37 4.38-4.37s4.38 1.957 4.38 4.37c0 2.412-1.96 4.368-4.38 4.368m0-10.834C2.904.066 0 2.96 0 6.533 0 10.105 2.904 13 6.486 13s6.487-2.895 6.487-6.467c0-3.572-2.905-6.467-6.487-6.467 "></path>
              </svg>
          </button>
        </form>
    </div>
  </div>

  @if($courses[0])
    <div class="row">
      @foreach($courses as $course)
          <?php
            $thumbnail="/storage/thumbnail/courses/".$course->thumbnail;
          ?>
          <a href="/courses/view/{{$course->id}}" class="col-md-9 mx-auto d-flex justify-content-around course-list">
            <div class="col-md-2">
              <img src="{{asset($thumbnail)}}" height="180px" width="150px">
            </div>
            <div class="col-md-8 d-flex align-items-start flex-column">
              <div class="mb-auto p-2">
                <div class="title">
                  {{ $course->title }}
                </div>
                <div class="trainer">
                  {{ $course->trainer_description }}
                </div>
                <div class="description">
                  {{ $course->description }}
                </div>
              </div>
              <div class="duration p-2">
                Duration: {{ $course->duration }} days
              </div>
            </div>
            <div class="col-md-2 d-flex align-items-center course-fee">
              @if($course->course_fee==0)
                Free
              @else
                Tk {{ $course->course_fee }}
              @endif

            </div>
          <!-- </div> -->
        </a>

          <!-- <div class="col-md-2.5">
            <div class="content-list">
              <a href="/courses/view/{{$course->id}}" class="panel-heading">
                <div class="content-title">{{ $course->title }}</div>
                <div class="" style="font-size: 14px; color: #efefef;">Trainer: {{ $course->trainer_description }}</div>
                <div class="content-author">Duration: {{ $course->duration }} days</div>
              </a>
            </div>
          </div> -->
      @endforeach 
    </div>
    <div class="text-center">{{ $courses->links() }}</div>
  @else
    <h2 class="text-center">Sorry, no course found</h2>
  @endif
</div>
@endsection
