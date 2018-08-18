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
                          <input type="hidden" name="section" value="courses">
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
                @if(count($courses))
                  @foreach($courses as $course)
                    <div class="col-lg-3 course_col">
                        <div class="course"><a href="{{asset('courses/preview/'.$course->id)}}">
                            <div class="course_image">
                                <img src="{{asset('/storage/thumbnail/course/'.$course->thumbnail)}}" alt="">
                                </div>
                            <div class="course_body">
                                <h4 class="course_title">{{$course->title}}</h4>
                                                
                                <div class="course_teacher">{{$course->author}}</div>
                                
                                <div class="course_text">
                                    <p>{{$course->description}}</p>
                                </div>

                                <div class="d-flex course-footer">
                                    <div class="mr-auto p-2">
                                    <i class="fa fa-clock-o"></i> {{$course->duration}} Hour</div>
                                    <div class="p-2 course_price">
                                    <i class="fa fa-dollar"></i>
                                        @if($course->course_fee>0)
                                            {{$course->course_fee}}  
                                        @else
                                            Free
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </a></div>
                    </div>
                  @endforeach
                @else
                  <h3 class="pagination">Sorry, no course found</h3>
                @endif
            </div>
            <div class="pagination">{{ $courses->render() }}</div>
        </div>
    </div>
</div>

@endsection