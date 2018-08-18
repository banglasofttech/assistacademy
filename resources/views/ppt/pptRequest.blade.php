@extends('layouts.adminpanel')

@section('title', "PPT Request")

@section('content_title', "PPT Request")

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
    @foreach($ppts as $ppt)
      <tr>
        <td><a href="{{asset('ppts/view/'.$ppt->id)}}"> {{ $ppt->file_name }}</a></td>
        <td><a href="{{asset('author/'.$users[$i]->id)}}">{{ $users[$i]->first_name }} {{ $users[$i]->last_name }}</td>
        <td>{{ $category[$i++]->catagory_name }}</td>
        
        <td>
          <a href="{{asset('/pptrequest/accept/'.$ppt->id)}}" class="btn btn-success">Accept</a>
          <a href="{{asset('/pptrequest/reject/'.$ppt->id)}}" class="btn btn-danger">Reject</a>
        </td>
      </tr>
  
    @endforeach
  </tbody>
</table>

<div class="text-center">{{ $ppts->links() }}</div>

@endsection
