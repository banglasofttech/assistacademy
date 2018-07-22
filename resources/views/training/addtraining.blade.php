@extends('layouts.adminpanel')

@section('title', "Add Training")

@section('content_title', "Add Training")

@section('content')
    <div class="col-md-9">
        <form class="panel-body" method="POST" action="{{ route('addtraining') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

             <div class="form-group">
              <label class="control-label" for="file_catagory">Category</label>
              <div id="csrf_catagory" data-token='{{ csrf_token() }}'></div>
              <select class="form-control" id="file_catagory" name="catagory_id" required autofocus style="width: 200px; height: 33px;">
                    <option value="" selected disabled>--Select Category--</option>
                    @foreach($catagories as $catagory)
                      <option value="{{ $catagory->id }}">{{ $catagory->catagory_name }}</option>
                    @endforeach
                    <option value="add-catagory">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Enter Title" name="title" required autofocus/>
            </div>

            <div class="form-group">
                <label>Description</label> 
                <textarea name="description" required placeholder="Enter Training Description" class="form-control" autofocus></textarea>
            </div>

            <div class="form-group">
                <label>Training Fee</label> 
                <input type="number" class="form-control" placeholder="Enter 0 for free training" name="fee" required autofocus/>

            </div>

            <div class="form-group">
                <label>Select File (<span id="file_format" style="color: gray;">mp4</span>)</label>
                <input type="file" name="file" required autofocus/>
            </div>

            <div class="form-group">
                <label>Select Thumbnail (<span id="thumb_fromat" style="color: gray;">jpg,jpeg,png</span>)</label>
                <input type="file" name="thumbnail" accept="image/x-png,image/gif,image/jpeg" required autofocus/>
            </div>

            <input type="hidden" name="uploader_email" value="{{ Auth::user()->email }}" />
            <input type="hidden" name="viewer_id"  value="0" />

            <div class="form-group">
             <input type="submit" class="btn btn-success" id="upload_file_button" value="Add Training">
           </div>

        </form>
    </div>
@endsection
