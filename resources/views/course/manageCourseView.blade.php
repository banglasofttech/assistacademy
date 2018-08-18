@extends('layouts.adminpanel')

@section('title', "Manage Course")

@section('content_title', "Manage Course")

@section('content')

      <table class="table table-striped ">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            @if(Auth::user()->user_type=="admin")
              <th scope="col">Trainer</th>
            @endif
            <th scope="col">Duration</th>
            <th scope="col">Views</th>
            <th scope="col">Users</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($courses as $course)
            <tr>
              <td style="word-wrap: break-word;">
                <a href="/courses/view/{{$course->id}}">{{ $course->title }}</a>
              </td>
              <td>{{ $course->catagory_id }}</td>

              @if(Auth::user()->user_type=="admin")
                <td><a href="/author/{{ $course->user_id }}">{{ $course->author }} </a></td>
              @endif

              <td>{{ $course->duration }} {{ $course->duration_type }}</td>
              <td>{{ $course->total_view }}</td>             
              <td>{{ $course->users }}</td>          
              <td>
                <a href="/managefiles/courses/edit/{{$course->id}}" class="btn btn-success btn-sm">Edit</a>
                <a href="/managefiles/courses/remove/{{$course->id}}" class="btn btn-danger btn-sm" id="remove_file_button">Remove</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">{{ $courses->links() }}</div>


@endsection
