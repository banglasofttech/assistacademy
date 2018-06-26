@extends('layouts.layout')

@section('title', "Welcome to Assist Academy")

@section('content')

<section class="training-list item-list" id="training-list">
  <h1 class="text-uppercase text-center item-heading">Online Training/Video</h1>
  <div class="row  d-flex justify-content-around">
      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/training/catagory/1">
            <img src="{{asset("content/images/hr.png")}}" width="120px" height="120px">
            <div class="content-title">HR</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/training/catagory/3">
            <img src="{{asset("content/images/marketing.png")}}" width="120px" height="120px">
            <div class="content-title">Marketing</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/training/catagory/2">
            <img src="{{asset("content/images/finance.png")}}" width="120px" height="120px">
            <div class="content-title">Finance</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/training/catagory/5">
            <img src="{{asset("content/images/it.png")}}" width="120px" height="120px">
            <div class="content-title">IT</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/training/catagory/6" data-toggle="modal" data-target="#exampleModalCenter" id="more-training">
            <img src="{{asset("content/images/more.png")}}" width="120px" height="120px">
            <div class="content-title">More</div>
          </a>
        </div>
      </div>
  </div>
</section>

<section class="course-list item-list"   id="course-list">
  <h1 class="text-uppercase text-center item-heading">Courses</h1>
  <div class="row  d-flex justify-content-around">
      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/courses/catagory/1">
            <img src="{{asset("content/images/hr.png")}}" width="120px" height="120px">
            <div class="content-title">HR</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/courses/catagory/3">
            <img src="{{asset("content/images/marketing.png")}}" width="120px" height="120px">
            <div class="content-title">Marketing</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/courses/catagory/2">
            <img src="{{asset("content/images/finance.png")}}" width="120px" height="120px">
            <div class="content-title">Finance</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/courses/catagory/5">
            <img src="{{asset("content/images/it.png")}}" width="120px" height="120px">
            <div class="content-title">IT</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/courses/catagory/6"  data-toggle="modal" data-target="#exampleModalCenter" id="more-course">
            <img src="{{asset("content/images/more.png")}}" width="120px" height="120px">
            <div class="content-title">More</div>
          </a>
        </div>
      </div>  
  </div>
</section>

<section class="item-list" id="book-list">
  <h1 class="text-uppercase text-center item-heading">Book</h1>
  <div class="row  d-flex justify-content-around">
      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/books/catagory/1" >
            <img src="{{asset("content/images/hr.png")}}" width="120px" height="120px">
            <div class="content-title">HR</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/books/catagory/3">
            <img src="{{asset("content/images/marketing.png")}}" width="120px" height="120px">
            <div class="content-title">Marketing</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/books/catagory/2">
            <img src="{{asset("content/images/finance.png")}}" width="120px" height="120px">
            <div class="content-title">Finance</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/books/catagory/5">
            <img src="{{asset("content/images/it.png")}}" width="120px" height="120px">
            <div class="content-title">IT</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/books/catagory/6" data-toggle="modal" data-target="#exampleModalCenter" id="more-books"> 
            <img src="{{asset("content/images/more.png")}}" width="120px" height="120px">
            <div class="content-title">More</div>
          </a>
        </div>
      </div>
  </div>
</section>

<section class="video-list item-list" id="video-list">
  <h1 class="text-uppercase text-center item-heading">Videos</h1>
  <div class="row  d-flex justify-content-around">
      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/videos/catagory/1">
            <img src="{{asset("content/images/hr.png")}}" width="120px" height="120px">
            <div class="content-title">HR</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/videos/catagory/3">
            <img src="{{asset("content/images/marketing.png")}}" width="120px" height="120px">
            <div class="content-title">Marketing</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/videos/catagory/2">
            <img src="{{asset("content/images/finance.png")}}" width="120px" height="120px">
            <div class="content-title">Finance</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/videos/catagory/5">
            <img src="{{asset("content/images/it.png")}}" width="120px" height="120px">
            <div class="content-title">IT</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/videos/catagory/6" data-toggle="modal" data-target="#exampleModalCenter" id="more-videos">
            <img src="{{asset("content/images/more.png")}}" width="120px" height="120px">
            <div class="content-title">More</div>
          </a>
        </div>
      </div>
  </div>
</section>

<section class=" item-list"  id="ppt-list">
  <h1 class="text-uppercase text-center item-heading">PPT</h1>
  <div class="row  d-flex justify-content-around">
      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/ppts/catagory/1">
            <img src="{{asset("content/images/hr.png")}}" width="120px" height="120px">
            <div class="content-title">HR</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/ppts/catagory/3">
            <img src="{{asset("content/images/marketing.png")}}" width="120px" height="120px">
            <div class="content-title">Marketing</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/ppts/catagory/2">
            <img src="{{asset("content/images/finance.png")}}" width="120px" height="120px">
            <div class="content-title">Finance</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/ppts/catagory/5">
            <img src="{{asset("content/images/it.png")}}" width="120px" height="120px">
            <div class="content-title">IT</div>
          </a>
        </div>
      </div>

      <div class="col-md-2.5">
        <div class="content-list">
          <a href="/ppts/catagory/6" data-toggle="modal" data-target="#exampleModalCenter" id="more-ppts">
            <img src="{{asset("content/images/more.png")}}" width="120px" height="120px">
            <div class="content-title">More</div>
          </a>
        </div>
      </div>
  </div>
</section>

<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Select Catagory</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        @foreach($catagories as $catagory)
        <span>
          <a class="btn btn-outline-info catagory-button" id="catagory-button" href="{{ $catagory->id }}">{{ $catagory->catagory_name }}</a>
        </span>
        @endforeach
      </div>
    </div>
  </div>
</div>

@endsection