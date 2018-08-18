@extends('layouts.adminpanel')

@section('title', "Edit Book")

@section('content_title', "Edit Book")

@section('content')
    <div class="col-md-9">
        <form class="panel-body" method="POST" action="{{ route('editBook') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

             <div class="form-group">
              <label class="control-label " for="file_catagory">File category</label>
              <div id="csrf_catagory" data-token='{{ csrf_token() }}'></div>
              <select class="form-control" name="catagory_id" id="file_catagory" style="width: 200px; height: 33px;">
                    <option value="" selected disabled>--Select Category--</option>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->catagory_name }}</option>
                    @endforeach
                    <option value="add-catagory">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label>File Name</label>
                <input type="text" class="form-control" placeholder="File Name" id="file_name" name="file_name" required autofocus value="{{ $book->file_name }}" />
            </div>

            <div class="form-group">
                <label>Select New PDF File (<span id="file_format" style="color: gray;">If you want to remove old file</span>)</label>
                <input type="file" class=" " id="file" name="file"/>
            </div>

            <div class="form-group">
                <label>Select New Banner (<span id="thumb_fromat" style="color: gray;">If you want to remove old banner</span>)</label>
                <input type="file" class=" " id="thumbnail" name="thumbnail" accept="image/x-png,image/gif,image/jpeg"/>
            </div>

            <input type="hidden" name="id"  value="{{ $book->id }}" />

            <div class="form-group">
             <input type="submit" class="btn btn-success" id="upload_file_button" value="Submit">
           </div>

        </form>
    </div>
@endsection
