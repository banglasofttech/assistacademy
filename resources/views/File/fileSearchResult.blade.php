

@extends('layouts.layout')

@section('title',$title)

@section('content')

<div class="content">
    <div class="courses item-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex section_title_container">
                        <h2 class="section_title">Search Results for "{{$title}}"</h2>
                    </div>
                </div>
            </div>

            <form method="POST"  class=" " action="{{ route('search') }}" enctype="multipart/form-data">
    {{ csrf_field() }}
    <input type="hidden" id="search_file_type" name="file_type" value="book">

    <input  type="hidden" class="flipkart-navbar-input" id="file_name" name="file_name" value="{{$title}}">
  
    <div class="row d-flex justify-content-around">
      <div class="col-md-2_5">
        <div class="content-list">
          <button type="submit" class="panel-heading book-search">
             <h3 class="section">Books</h3>
            <h3 class="search-result">{{$total_books}}</h3>
        </div>
      </div>

      <div class="col-md-2_5">
        <div class="content-list">
          <button type="submit" class="panel-heading ppt-search">
             <h3 class="section">PPTs</h3>
            <h3 class="search-result">{{$total_ppts}}</h3>
          </button>
        </div>
      </div>


      <div class="col-md-2_5">
        <div class="content-list">
          <button type="submit" class="panel-heading video-search">
             <h3 class="section">Videos</h3>
            <h3 class="search-result">{{$total_videos}}</h3>
          </button>
        </div>
      </div> 

      <div class="col-md-2_5">
        <div class="content-list">
          <button type="submit" class="panel-heading course-search">
             <h3 class="section">Courses</h3>
            <h3 class="search-result">{{$total_courses}}</h3>
          </button>
        </div>
      </div> 

      <div class="col-md-2_5">
        <div class="content-list">
          <button type="submit" class="panel-heading training-search">
            <h3 class="section">Trainings</h3>
            <h3 class="search-result">{{$total_trainings}}</h3>
          </button>
        </div>
      </div>
    </div>

  </form>
        </div>
    </div>
</div>

@endsection


