@extends('layouts.adminpanel')

@section('title', "Course Request")

@section('content_title', "Course Request")

@section('content')

  <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Trainer</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
    
  </thead>
  <tbody>
    <?php $i=0 ?>
    @foreach($courses as $course)
      <tr>
        <td><a href="{{asset('courses/view/'.$course->id)}}"> {{ $course->title }}</a></td>
        <td><a href="{{asset('author/'.$users[$i]->id)}}">{{ $users[$i]->first_name }} {{ $users[$i]->last_name }}</td>
        <td>{{ $category[$i++]->catagory_name }}</td>
        
        <td>
          <a href="{{asset('/courserequest/accept/'.$course->id)}}" class="btn btn-success">Accept</a>
          <a href="{{asset('/courserequest/reject/'.$course->id)}}" class="btn btn-danger">Reject</a>
        </td>
      </tr>
  
    @endforeach
  </tbody>
</table>

<div class="text-center">{{ $courses->links() }}</div>

@endsection
