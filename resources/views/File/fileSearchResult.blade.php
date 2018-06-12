@extends('layouts.layout')

@section('title',$title)

@section('content')
<div class="">

  <div class="item-panel bg-warning d-flex">
    <div class="mr-auto p-2">
      <font style="font-size: 25px;">Search Results for "{{$title}}"</font>
    </div>
  </div>

  <form method="POST"  class=" " action="{{ route('search') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" id="search_file_type" name="file_type" value="book">

    <input  type="hidden" class="flipkart-navbar-input" id="file_name" name="file_name" value="{{$title}}">
  
    <div class="row d-flex justify-content-around">
      <div class="col-md-2.5">
        <div class="content-list">
          <button type="submit" class="panel-heading book-search">
            <div class="content-author"><h2>Books</h2></div>
            <div class="content-name"><h3>{{$total_books}}</h3></div>
          </button>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <button type="submit" class="panel-heading ppt-search">
            <div class="content-author"><h2>PPTs</h2></div>
            <div class="content-name"><h3>{{$total_ppts}}</h3></div>
          </button>
        </div>
      </div>


      <div class="col-md-2.5">
        <div class="content-list">
          <button type="submit" class="panel-heading video-search">
            <div class="content-author"><h2>Videos</h2></div>
            <div class="content-name"><h3>{{$total_videos}}</h3></div>
          </button>
        </div>
      </div> 

      <div class="col-md-2.5">
        <div class="content-list">
          <button type="submit" class="panel-heading course-search">
            <div class="content-author"><h2>Courses</h2></div>
            <div class="content-name"><h3>{{$total_courses}}</h3></div>
          </button>
        </div>
      </div> 

      <div class="col-md-2.5">
        <div class="content-list">
          <button type="submit" class="panel-heading training-search">
            <div class="content-author"><h2>Trainings</h2></div>
            <div class="content-name"><h3>{{$total_trainings}}</h3></div>
          </button>
        </div>
      </div>
    </div>

  </form>
</div>
@endsection
