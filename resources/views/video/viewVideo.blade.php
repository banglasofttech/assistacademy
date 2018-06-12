@extends('layouts.layout')

@section('title', $title)

@section('content_title', $title)

@section('content')
  <?php
    $image='/storage/thumbnail/videos/'.$video->thumbnail;
    $file='/storage/files/videos/'.$video->file;
    $authorLink='/author/'.$author->id;
    $downloadLink='/videos/download/'.$video->id;
  ?>

  <div class="row ">
    <div class="col-md-5">
      <!-- video Info -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px">Video Info</h2>

      <div class="row">
        <div class="col-md-5">
          <img src="{{asset($image)}}" width="150px" height="180px" style="float: right;">
        </div>
        
        <div class="col-md-7" style="float: left;">
          <span style="font-weight: bold;">Title: </span> {{$video->file_name}}
          <br>
          <span style="font-weight: bold;">Author: </span> <a class="" href={{$authorLink}}>{{$author->first_name}} {{$author->last_name}}</a>
          <br>
          <span style="font-weight: bold;">Catagory: </span> {{$video->catagory_name}}
          <br><br>
          <span style="font-weight: bold;">Fee: </span> {{$video->Fee}}
          <br>
          <span style="font-weight: bold;">Total Views: </span> {{$video->total_view}}
          <br>
          <span style="font-weight: bold;">Uploaded at: </span> {{$video->created_at}}
          <br>
          <!-- <a href={{$downloadLink}} class="btn btn-success" role="button">Download Now</a> -->
        </div>
      </div>

      <!-- Related videos -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px; margin-top: 50px;">Related Videos</h2>
       <div class="row">
          @foreach($related_videos as $video)
            <div class="col-md-6">
              <?php
                $image='/storage/thumbnail/videos/'.$video->thumbnail;
                $videoLink='/videos/view/'.$video->id;
              ?>
              <div class="content-list">
                <a href={{$videoLink}} class="panel-heading">
                  <div class="content-name">{{ $video->file_name }}</div>
                  <div class="content-fee">( {{ $video->Fee }} )</div>
                  <div class="content-author">{{ $video->author }}</div>
                  <img src="{{asset($image)}}" width="160px" height="150px">
                </a>
              </div>
            </div>
          @endforeach
       </div>
    </div>

    <div class="col-md-7">
      <video width="100%" height="500px" controls>
        <source src="{{asset($file)}}" type="video/mp4">
      </video>
    </div>
  </div>

   

@endsection
