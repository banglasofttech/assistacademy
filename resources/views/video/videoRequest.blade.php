@extends('layouts.adminpanel')

@section('title', "Video Request")

@section('content_title', "Video Request")

@section('content')

  <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Title</th>
      <th scope="col">Uploaded By</th>
      <th scope="col">Category</th>
      <th scope="col">Action</th>
    </tr>
    
  </thead>
  <tbody>
    <?php $i=0 ?>
    @foreach($videos as $video)
      <tr>
        <td><a href="{{asset('videos/view/'.$video->id)}}"> {{ $video->file_name }}</a></td>
        <td><a href="{{asset('author/'.$users[$i]->id)}}">{{ $users[$i]->first_name }} {{ $users[$i]->last_name }}</td>
        <td>{{ $category[$i++]->catagory_name }}</td>
        
        <td>
          <a href="{{asset('/videorequest/accept/'.$video->id)}}" class="btn btn-success">Accept</a>
          <a href="{{asset('/videorequest/reject/'.$video->id)}}" class="btn btn-danger">Reject</a>
        </td>
      </tr>
  
    @endforeach
  </tbody>
</table>

<div class="text-center">{{ $videos->links() }}</div>

@endsection
