@extends('layouts.adminpanel')

@section('title', "Edit Training")

@section('content_title', "Edit Training")

@section('content')

    <div class="col-md-9">
        <form class="panel-body" method="POST" action="{{ route('editTraining') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

             <div class="form-group">
              <label class="control-label" for="file_catagory">Category</label>
              <div id="csrf_catagory" data-token='{{ csrf_token() }}'></div>
              <select class="form-control" id="file_catagory" name="catagory_id"  style="width: 200px; height: 33px;">
                    <option value="" selected disabled>--Select Category--</option>
                    @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->catagory_name }}</option>
                    @endforeach
                    <option value="add-catagory">Other</option>
                </select>
            </div>

            <div class="form-group">
                <label>Title</label>
                <input type="text" class="form-control" placeholder="Enter Title" name="title" required autofocus value="{{ $training->title }}" />
            </div>

            <div class="form-group">
                <label>About Trainer</label> 
                <textarea name="trainer_description" required placeholder="Enter something about Trainer" class="form-control" autofocus>{{ $training->trainer_description }}</textarea>
            </div>

            <div class="form-group">
                <label>Training Duration</label> <br>
                <input type="number" class="form-control" placeholder="Enter training duration" name="duration" required autofocus style="display: inline; width: 250px" value="{{ $training->duration }}" />
                <select class="form-control" name="duration_type" style="display: inline; width: 100px">
                    <option value="Hours">Hours</option>
                    <option value="Days">Days</option>
                    <option value="Months">Months</option>
                    <option value="Year">Year</option>
                  </select>
            </div>

            <div class="form-group">
                <label>Training Fee</label> 
                <input type="number" class="form-control" placeholder="Enter 0 for free training" name="fee" required autofocus value="{{ $training->fee }}" />
            </div>

            <div class="form-group">
                <label>Objective</label> 
                <textarea name="objective" required placeholder="Enter Training Objective separated with comma (,)" class="form-control" autofocus>{{ $training->objective }}</textarea>
            </div>

            <div class="form-group">
                <label>Introduction</label> 
                <textarea name="introduction_text" required placeholder="Enter Introduction" class="form-control" autofocus>{{ $training->introduction_text }}</textarea>
            </div>

            <div class="form-group">
                <label>Select New Introduction File (<span id="file_format" style="color: gray;">If you want to change old introfuction file</span>)</label>
                <input type="file" name="introduction_file"/>
            </div>

            <div class="form-group">
                <label>Select Video Files (<span id="file_format" style="color: gray;">You can select multiple mp4 files</span>)</label>
                <input type="file" name="video_files[]" multiple />

                <input type="radio" name="video_postion" value="before" id="video_before" checked> <label for="video_before">Before old videos</label>
                <input type="radio" name="video_postion" value="after" id="video_after"> <label for="video_after">After old videos</label>
            </div>

            <div class="form-group">
                <label>Old Videos</label>
                <table>
                  <thead>
                    <th width="80%">Name</th>
                    <th width="20%">Action</th>
                  </thead>
                  <tbody>
                     @for($i=1; $i < count($video_files); $i++)
                      <tr>
                        <td width="80%">{{ $video_files[$i-1] }}</td>
                        <td width="20%"><a class="remove_video" href="#">Remove</a></td>
                      </tr>
                    @endfor
                  </tbody>
                </table>
            </div>

            <div class="form-group">
                <label>Select PPT Files (<span id="file_format" style="color: gray;">You can select multiple ppt files</span>)</label>
                <input type="file" name="ppt_files[]" multiple />

                <input type="radio" name="ppt_postion" value="before" id="ppt_before" checked> <label for="ppt_before">Before old ppt</label>
                <input type="radio" name="ppt_postion" value="after" id="ppt_after"> <label for="ppt_after">After old ppt</label>
            </div>

            <div class="form-group">
                <label>Old PPT</label>
                <table>
                  <thead>
                    <th width="80%">Name</th>
                    <th width="20%">Action</th>
                  </thead>
                  <tbody>
                    @for($i=1; $i < count($ppt_files); $i++)
                      <tr>
                        <td width="80%">{{ $ppt_files[$i-1] }}</td>
                        <td width="20%"><a class="remove_ppt" href="#">Remove</a></td>
                      </tr>
                    @endfor
                  </tbody>
                </table>
            </div>

            <div class="form-group">
                <label>Select New Banner (<span id="thumb_fromat" style="color: gray;">If you want to change old banner</span>)</label>
                <input type="file" name="thumbnail" accept="image/x-png,image/gif,image/jpeg"/>
            </div>

            <input type="hidden" name="id"  value="{{ $training->id }}" />
            <input type="hidden" name="removed_video" id="removed_video" value="" />
            <input type="hidden" name="removed_ppt" id="removed_ppt" value="" />

            <div class="form-group">
             <input type="submit" class="btn btn-success" id="upload_file_button" value="Submit">
           </div>

        </form>
    </div>
@endsection
