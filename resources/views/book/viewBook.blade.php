@extends('layouts.layout')

@section('title', $title)

@section('content_title', $title)

@section('content')
  <?php
    $image='/storage/thumbnail/books/'.$book->thumbnail;
    $file='/storage/files/books/'.$book->file;
    $authorLink='/author/'.$author->id;
    $downloadLink='/books/download/'.$book->id;
  ?>

  <div class="row ">
    <div class="col-md-5">
      <!-- Book Info -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px">Book Info</h2>

      <div class="row">
        <div class="col-md-5">
          <img src="{{asset($image)}}" width="150px" height="180px" style="float: right;">
        </div>
        
        <div class="col-md-7" style="float: left;">
          <span style="font-weight: bold;"></span> {{$book->file_name}}
          <br>
          <span style="font-weight: bold;">By: </span> <a class="" href={{$authorLink}}>{{$author->first_name}} {{$author->last_name}}</a>
          <br>
          <span style="font-weight: bold;">Catagory: </span> {{$book->catagory_name}}
          <br><br>
          <span style="font-weight: bold;">Total Views: </span> {{$book->total_view}}
          <br>
          <span style="font-weight: bold;">Uploaded at: </span> {{$book->created_at}}
          <br>
          <!-- <a href={{$downloadLink}} class="btn btn-success" role="button">Download Now</a> -->
        </div>
      </div>

      <!-- Related Books -->
      <h2 class="item-panel text-center text-primary" style="padding: 5px; margin-top: 50px;">Related Books</h2>
       <div class="row">
          @foreach($related_books as $book)
            <div class="col-md-6">
              <?php
                $image='/storage/thumbnail/books/'.$book->thumbnail;
                $bookLink='/books/view/'.$book->id;
              ?>
              <div class="content-list">
                <a href={{$bookLink}} class="panel-heading">
                  <div class="content-name">{{ $book->file_name }}</div>
                  <div class="content-author">{{ $book->author }}</div>
                  <img src="{{asset($image)}}" width="160px" height="150px">
                </a>
              </div>
            </div>
          @endforeach
       </div>
    </div>

    <div class="col-md-7">
       <iframe src='http://docs.google.com/gview?embedded=true&url={{asset($file)}}' width="100%" style="height:100%;" frameborder="0"></iframe> 
        <!--<iframe name="myiframe"  width="100%" id="myiframe" src="{{asset($file)}}" style="height: 1000px;">-->
    </div>
  </div>

  <script type="text/javascript">
    
    $(document).ready(function() {
      console.log('Coming');
      function stateChange(newState) {
          setTimeout(function () {
              console.log("Hello");
          }, 5000);
      }
    });
  </script>
   

@endsection
