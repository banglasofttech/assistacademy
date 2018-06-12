@extends('layouts.layout')

@section('title', "Search File")

@section('content_title', "Search File")

@section('content')
    <div class="col-md-9">
        <form class="panel-body" method="POST" action="{{ route('search') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

             @if (count($errors) > 0)
                <p class="bg-danger text-danger text-center">
                      @foreach($errors->all() as $error)
                        {{$error}}
                        <br>
                      @endforeach
                </p>
              @endif

            <div class="form-group">
                <label>File Name </label>
                <input type="text" class="form-control" placeholder="File Name" id="file_name" name="file_name" required autofocus/>
            </div>

             <div class="form-group">
                <label class="control-label " for="file_type">File Type</label>
                <select class="form-control" id="file_type" name="file_type"  required="required" style="width: 200px; height: 33px;">
                    <option value="">--Select a type--</option>
                    <option value="book">Book</option>
                    <option value="video">Video</option>
                    <option value="ppt">PPT</option>
                </select>
            </div>

            <div class="form-group">
                <div >
                    <button type="submit" class="btn btn-success">
                        Search
                    </button>
                </div>
            </div>

             <!-- <input type="submit" class="btn btn-success" id="search_file_button" value="Search"> -->

        </form>
    </div>

@endsection
