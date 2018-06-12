@extends('layouts.adminpanel')

@section('title', "Manage Course")

@section('content_title', "Manage Course")

@section('content')

      <table class="table table-striped ">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Trainer</th>
            <th scope="col">Duration</th>
            <th scope="col">Views</th>
            <th scope="col">Users</th>
          </tr>
        </thead>
        <tbody>
          @foreach($courses as $course)
            <tr>
              <input type="hidden"  id="content_id" value="{{ $course->id }}" >
              <td style="word-wrap: break-word;">
                <a href="/courses/view/{{$course->id}}">{{ $course->title }}</a>
              </td>
              <td style="word-wrap: break-word;">{{ $course->trainer_description}}</td>
              <td>{{ $course->duration  }}</td>
              <td>{{ $course->total_view }}</td>             
              <td>{{ $course->users }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">{{ $courses->links() }}</div>


@endsection
