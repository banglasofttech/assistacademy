@extends('layouts.layout')

@section('title',$title)

@section('content')

<div class="content">
    <div class="courses item-section">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="d-flex section_title_container">
                        <h2 class="mr-auto p-2 section_title">{{$title}}</h2>
                        <form method="post" class="d-flex flex-row align-items-center justify-content-center" action="{{route('filesection')}}">
                          {{csrf_field()}}
                          <input type="hidden" name="section" value="videos">
                            <select name="catagory_id" class="p-2 dropdown_item_select custom-select" required>
                                  <option value="0">All Category</option>
                                  @foreach($catagories as $catagory)
                                    <option value="{{$catagory->id}}">{{$catagory->catagory_name}}</option>
                                  @endforeach
                            </select>
                            <input type="submit" class="p-2 btn section_button" value="Refresh">
                        </form>
                    </div>
                </div>
            </div>

            <div class="row courses_row">
                @if(count($videos))
                  @foreach($videos as $video)
                    <div class="col-lg-3 course_col">
                        <div class="course"><a href="{{asset('videos/view/'.$video->id)}}">
                            <div class="course_image">
                                <img src="{{asset('/storage/thumbnail/videos/'.$video->thumbnail)}}" alt="">
                                </div>
                            <div class="course_body">
                                <h4 class="course_title">{{$video->file_name}}</h4>
                                <div class="course_teacher">{{$video->author}}</div>
                            </div>
                        </a></div>
                    </div>
                  @endforeach
                @else
                  <h3 class="pagination">Sorry, no video found</h3>
                @endif
            </div>
            <div class="pagination">{{ $videos->render() }}</div>
        </div>
    </div>
</div>

@endsection