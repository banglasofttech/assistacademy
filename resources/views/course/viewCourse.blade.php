@extends('layouts.layout')

@section('title', $course->title)

@section('content_title', $course->title)

@section('content')
  <?php
    
  ?>

  <div class="row ">
    <div class="col-md-10 mx-auto">

      <!-- Title and Trainer info -->
      <div align="center">
        <h2>{{$course->title}}</h2>
        <h6 class="font-italic">{{$course->trainer_description}}</h6>
      </div>

      <br><br>

      <table class="table table-bordered">
        <tbody>
          <tr>
            <th>Duration:</th>
            <td>{{$course->duration}} days</td>
          </tr>

          <tr>
            <th>Description:</th>
            <td>{{$course->description}}</td>
          </tr>

          <tr>
            <th>Outcome:</th>
            <td>{{$course->outcome}}</td>
          </tr>

          <tr>
            <th>Introduction:</th>
            <td>
              {{$course->introduction_text}}

              @if($course->introduction_file)
                <br><br>
                <video width="80%" height="350px" controls>
                  <source src="/storage/files/courses/{{$course->introduction_file}}" type="video/mp4">
                </video>
              @endif
            </td>
          </tr>

          <tr>
            <th>Books:</th>
            <td>
              Links:<br>
              @foreach($book_links as $book_link)
                <a href="{{$book_link}}">{{$book_link}}</a><br>
              @endforeach

              Files:<br>
              @foreach($book_files as $book_file)
                <a href="/storage/files/books/{{$book_file}}">{{$book_file}}</a><br>
              @endforeach
            </td>
          </tr>

          <tr>
            <th>PPTs:</th>
            <td>
              Links:<br>
              @foreach($ppt_links as $ppt_link)
                <a href="{{$ppt_link}}">{{$ppt_link}}</a><br>
              @endforeach

              Files:<br>
              @foreach($ppt_files as $ppt_file)
                <a href="/storage/files/ppts/{{$ppt_file}}">{{$ppt_file}}</a><br>
              @endforeach
            </td>
          </tr>

          <tr>
            <th>Videos:</th>
            <td>
              Links:<br>
              @foreach($video_links as $video_link)
                <a href="{{$video_link}}">{{$video_link}}</a><br>
              @endforeach

              Files:<br>
              @foreach($video_files as $video_file)
                <a href="/storage/files/videos/{{$video_file}}">{{$video_file}}</a><br>
              @endforeach
            </td>
          </tr>

          <tr>
            <th>Exam Questions:</th>
            <td>
              @foreach($exam_files as $exam_file)
                <a href="/storage/files/books/{{$exam_file}}">{{$exam_file}}</a><br>
              @endforeach
            </td>
          </tr>

          <tr>
            <td colspan="2" align="center" class="font-weight-bold">Instructions:</td>
          </tr>

          @for($i=1;$i<=$duration;$i++)
            <tr>
              <th>Day {{$i}}</th>
              <td><p>{{$instructions[$i-1]}}</p></td>
            </tr>
          @endfor

        </tbody>
      </table>

    </div>
  </div>

   

@endsection
