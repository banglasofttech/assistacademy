@extends('layouts.layout')

@section('title', $title)

@section('content_title', $title)

@section('content')
  <?php
    $image='/storage/thumbnail/ppts/'.$ppt->thumbnail;
    $file='/storage/files/ppts/'.$ppt->file;
    $authorLink='/author/'.$author->id;
    $downloadLink='/ppts/download/'.$ppt->id;
  ?>

  <div class="row ">
    <div class="col-md-5">
      <!-- ppt Info -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px">PPT Info</h2>

      <div class="row">
        <div class="col-md-5">
          <img src="{{asset($image)}}" width="150px" height="180px" style="float: right;">
        </div>
        
        <div class="col-md-7" style="float: left;">
          <span style="font-weight: bold;">Title: </span> {{$ppt->file_name}}
          <br>
          <span style="font-weight: bold;">Author: </span> <a class="" href={{$authorLink}}>{{$author->first_name}} {{$author->last_name}}</a>
          <br>
          <span style="font-weight: bold;">Catagory: </span> {{$ppt->catagory_name}}
          <br><br>
          <span style="font-weight: bold;">Total Views: </span> {{$ppt->total_view}}
          <br>
          <span style="font-weight: bold;">Uploaded at: </span> {{$ppt->created_at}}
          <br>
          <!-- <a href={{$downloadLink}} class="btn btn-success" role="button">Download Now</a> -->
        </div>
      </div>

      <!-- Related ppts -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px; margin-top: 50px;">Related PPTs</h2>
       <div class="row">
          @foreach($related_ppts as $ppt)
            <div class="col-md-6">
              <?php
                $image='/storage/thumbnail/ppts/'.$ppt->thumbnail;
                $pptLink='/ppts/view/'.$ppt->id;
              ?>
              <div class="content-list">
                <a href={{$pptLink}} class="panel-heading">
                  <div class="content-name">{{ $ppt->file_name }}</div>
                  <div class="content-author">{{ $ppt->author }}</div>
                  <img src="{{asset($image)}}" width="160px" height="150px">
                </a>
              </div>
            </div>
          @endforeach
       </div>
    </div>

    <div class="col-md-7">
      <iframe src='http://docs.google.com/gview?embedded=true&url={{asset($file)}}' width="100%" style="height:650px;" frameborder="0"></iframe>
    </div>
  </div>

   

@endsection
