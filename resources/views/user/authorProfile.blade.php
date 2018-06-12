@extends('layouts.layout')

@section('title', $title)

@section('content_title', $title)

@section('content')
  
  <div class="row">
    <div class="col-md-5">
      <h2 class="item-panel text-center text-primary" style="padding: 5px">Personal Info</h2>
      <div class="row">
        <div class="col-md-5">
          <img src="{{asset('content/images/author.png')}}" width="150px" height="150px" style="float: right;">
        </div>
        
        <div class="col-md-7" style="float: left;">
          <span style="font-weight: bold;">Name: </span> {{$title}}
          <br>
          <span style="font-weight: bold;">Email: </span> {{$author->email}}
          <br>
          <span style="font-weight: bold;">Joined: </span> {{$author->created_at}}
          <br><br>
          <span style="font-weight: bold;">Total Uploaded Books: </span> {{$books}}
          <br>
          <span style="font-weight: bold;">Total Uploaded Videos: </span> {{$videos}}
          <br>
          <span style="font-weight: bold;">Total Uploaded PPTs: </span> {{$ppts}}
        </div>
      </div>
    </div>
    
    <div class="col-md-7">
      <h2 class="item-panel text-center text-primary" style="padding: 5px">Uploaded Files</h2>

      <div class="row">
        <div class="col-md-4">
          <div class="content-list">
            <a href="/books/author/{{$author->email}}">
              <img src="{{asset("content/images/book.png")}}" width="120px" height="120px">
              <div class="content-title">Books</div>
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="content-list">
            <a href="/ppts/author/{{$author->email}}">
              <img src="{{asset("content/images/ppt.png")}}" width="120px" height="120px">
              <div class="content-title">PPTs</div>
            </a>
          </div>
        </div>

        <div class="col-md-4">
          <div class="content-list">
            <a href="/videos/author/{{$author->email}}">
              <img src="{{asset("content/images/video.png")}}" width="120px" height="120px">
              <div class="content-title">Training</div>
            </a>
          </div>
        </div>

      </div>
    </div>
@endsection
