@extends('layouts.layout')

@section('title', $title)

@section('content_title', $title)

@section('content')
  <?php
    $image='/storage/thumbnail/trainings/'.$training->thumbnail;
    $file='/storage/files/trainings/'.$training->file;
    $authorLink='/author/'.$author->id;
    $downloadLink='/trainings/download/'.$training->id;
  ?>

  <div class="row ">
    <div class="col-md-5">
      <!-- training Info -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px">Training Info</h2>

      <div class="row">
        <div class="col-md-5">
          <img src="{{asset($image)}}" width="150px" height="180px" style="float: right;">
        </div>
        
        <div class="col-md-7" style="float: left;">
          <span style="font-weight: bold;">Title: </span> {{$training->file_name}}
          <br>
          <span style="font-weight: bold;">Author: </span> <a class="" href={{$authorLink}}>{{$author->first_name}} {{$author->last_name}}</a>
          <br>
          <span style="font-weight: bold;">Catagory: </span> {{$training->catagory_name}}
          <br><br>
          <span style="font-weight: bold;">Fee: </span> {{$training->Fee}}
          <br>
          <span style="font-weight: bold;">Total Views: </span> {{$training->total_view}}
          <br>
          <span style="font-weight: bold;">Uploaded at: </span> {{$training->created_at}}
          <br>
          <!-- <a href={{$downloadLink}} class="btn btn-success" role="button">Download Now</a> -->
        </div>
      </div>

      <!-- Related trainings -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px; margin-top: 50px;">Related trainings</h2>
       <div class="row">
          @foreach($related_trainings as $training)
            <div class="col-md-6">
              <?php
                $image='/storage/thumbnail/trainings/'.$training->thumbnail;
                $trainingLink='/trainings/view/'.$training->id;
              ?>
              <div class="content-list">
                <a href={{$trainingLink}} class="panel-heading">
                  <div class="content-name">{{ $training->file_name }}</div>
                  <div class="content-fee">( {{ $training->Fee }} )</div>
                  <div class="content-author">{{ $training->author }}</div>
                  <img src="{{asset($image)}}" width="160px" height="150px">
                </a>
              </div>
            </div>
          @endforeach
       </div>
    </div>

    <div class="col-md-7">
      <training width="100%" height="500px" controls>
        <source src="{{asset($file)}}" type="training/mp4">
      </training>
    </div>
  </div>

   

@endsection
