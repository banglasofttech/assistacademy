@extends('layouts.adminpanel')

@section('title', "Edit Course")

@section('content_title', "Edit Course")

@section('content')

    <div class="col-md-9">
        <form class="panel-body" method="POST" action="{{ route('editCourse') }}" enctype="multipart/form-data">
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
                <input type="text" class="form-control" placeholder="Enter Title" name="title" required autofocus value="{{ $course->title }}" />
            </div>

            <div class="form-group">
                <label>About Trainer</label> 
                <textarea name="trainer_description" required placeholder="Enter something about Trainer" class="form-control" autofocus>{{ $course->trainer_description }}</textarea>
            </div>

            <div class="form-group">
                <label>Course Duration</label> <br>
                <input type="number" class="form-control" placeholder="Enter training duration" name="duration" required autofocus style="display: inline; width: 250px" value="{{ $course->duration }}" />
                <select class="form-control" name="duration_type" style="display: inline; width: 100px">
                    <option value="Hours">Hours</option>
                    <option value="Days">Days</option>
                    <option value="Months">Months</option>
                    <option value="Year">Year</option>
                  </select>
            </div>

            <div class="form-group">
                <label>Course Fee</label> 
                <input type="number" class="form-control" placeholder="Enter 0 for free course" name="course_fee" required autofocus value="{{ $course->course_fee }}" />
            </div>

            <div class="form-group">
                <label>Description</label> 
                <textarea name="description" required placeholder="Enter description" class="form-control" autofocus>{{ $course->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Outcome</label> 
                <textarea name="outcome" required placeholder="Enter course outcome separated with comma (,)" class="form-control" autofocus>{{ $course->outcome }}</textarea>
            </div>

            <div class="form-group">
                <label>Introduction</label> 
                <textarea name="introduction_text" required placeholder="Enter Introduction" class="form-control" autofocus>{{ $course->introduction_text }}</textarea>
            </div>

            <div class="form-group">
                <label>Select New Introduction File (<span id="file_format" style="color: gray;">If you want to change old introfuction file</span>)</label>
                <input type="file" name="introduction_file"/>
            </div>

            <div class="form-group">
                <label>Course Material: Book Links</label> 
                <textarea class="form-control" placeholder="Enter Book Links separated with comma (,)" name="book_link">{{ $course->book_link }}</textarea>
            </div>

            <div class="form-group">
                <label>Select PDF Files (<span id="file_format" style="color: gray;">You can select multiple pdf files</span>)</label>
                <input type="file" name="book_files[]" multiple  accept="application/pdf"/>

                <input type="radio" name="book_postion" value="before" id="book_before" checked> <label for="book_before">Before old books</label>
                <input type="radio" name="book_postion" value="after" id="book_after"> <label for="book_after">After old books</label>
            </div>

            <div class="form-group">
                <label>Old Books</label>
                <table>
                  <thead>
                    <th width="85%">Name</th>
                    <th width="15%">Action</th>
                  </thead>
                  <tbody>
                     @for($i=1; $i < count($book_files); $i++)
                      <tr>
                        <td width="85%">{{ $book_files[$i-1] }}</td>
                        <td width="15%"><a class="remove_book" href="#">Remove</a></td>
                      </tr>
                    @endfor
                  </tbody>
                </table>
            </div>

            <div class="form-group">
                <label>Course Material: Video Links</label> 
                <textarea class="form-control" placeholder="Enter Video Links separated with comma (,)" name="video_link">{{ $course->video_link }}</textarea>
            </div>

            <div class="form-group">
                <label>Select Video Files (<span id="file_format" style="color: gray;">You can select multiple mp4 files</span>)</label>
                <input type="file" name="video_files[]" multiple accept="video/mp4" />

                <input type="radio" name="video_postion" value="before" id="video_before" checked> <label for="video_before">Before old videos</label>
                <input type="radio" name="video_postion" value="after" id="video_after"> <label for="video_after">After old videos</label>
            </div>

            <div class="form-group">
                <label>Old Videos</label>
                <table>
                  <thead>
                    <th width="85%">Name</th>
                    <th width="15%">Action</th>
                  </thead>
                  <tbody>
                     @for($i=1; $i < count($video_files); $i++)
                      <tr>
                        <td width="85%">{{ $video_files[$i-1] }}</td>
                        <td width="15%"><a class="remove_video" href="#">Remove</a></td>
                      </tr>
                    @endfor
                  </tbody>
                </table>
            </div>

            <div class="form-group">
                <label>Course Material: PPT Links</label> 
                <textarea class="form-control" placeholder="Enter PPT Links separated with comma (,)" name="ppt_link">{{ $course->ppt_link }}</textarea>
            </div>

            <div class="form-group">
                <label>Select PPT Files (<span id="file_format" style="color: gray;">You can select multiple ppt files</span>)</label>
                <input type="file" name="ppt_files[]" multiple  accept="application/vnd.ms-powerpoint" />

                <input type="radio" name="ppt_postion" value="before" id="ppt_before" checked> <label for="ppt_before">Before old ppt</label>
                <input type="radio" name="ppt_postion" value="after" id="ppt_after"> <label for="ppt_after">After old ppt</label>
            </div>

            <div class="form-group">
                <label>Old PPT</label>
                <table>
                  <thead>
                    <th width="85%">Name</th>
                    <th width="15%">Action</th>
                  </thead>
                  <tbody>
                    @for($i=1; $i < count($ppt_files); $i++)
                      <tr>
                        <td width="85%">{{ $ppt_files[$i-1] }}</td>
                        <td width="15%"><a class="remove_ppt" href="#">Remove</a></td>
                      </tr>
                    @endfor
                  </tbody>
                </table>
            </div>

            <div class="form-group">
                <label>Select Exam Files (<span id="file_format" style="color: gray;">You can select multiple pdf files</span>)</label>
                <input type="file" name="exam_files[]" multiple  accept="application/pdf"/>

                <input type="radio" name="ef_postion" value="before" id="ef_before" checked> <label for="ef_before">Before old files</label>
                <input type="radio" name="ef_postion" value="after" id="ef_after"> <label for="ef_after">After old files</label>
            </div>

            <div class="form-group">
                <label>Old PPT</label>
                <table>
                  <thead>
                    <th width="85%">Name</th>
                    <th width="15%">Action</th>
                  </thead>
                  <tbody>
                    @for($i=1; $i < count($exam_files); $i++)
                      <tr>
                        <td width="85%">{{ $exam_files[$i-1] }}</td>
                        <td width="15%"><a class="remove_ef" href="#">Remove</a></td>
                      </tr>
                    @endfor
                  </tbody>
                </table>
            </div>

            <div class="form-group">
                <label>Select New Banner (<span id="thumb_fromat" style="color: gray;">If you want to change old banner</span>)</label>
                <input type="file" name="thumbnail" accept="image/x-png,image/gif,image/jpeg"/>
            </div>

            <div class="form-group">
                <label>Study Instruction</label>
            </div>

            @for($i = 1; $i < count($instruction); $i++)
                <div class="form-group">
                    <label>Session {{ $i }}</label>
                    <textarea class="form-control" placeholder="Enter study instruction" name="study_instruction[]" required autofocus>{{ $instruction[$i-1] }}</textarea>
                </div>
            @endfor

            <input type="hidden" name="id"  value="{{ $course->id }}" />
            <input type="hidden" name="removed_video" id="removed_video" value="" />
            <input type="hidden" name="removed_ppt" id="removed_ppt" value="" />
            <input type="hidden" name="removed_book" id="removed_book" value="" />
            <input type="hidden" name="removed_ef" id="removed_ef" value="" />

            <div class="form-group">
             <input type="submit" class="btn btn-success" value="Submit">
           </div>

        </form>
    </div>
@endsection
