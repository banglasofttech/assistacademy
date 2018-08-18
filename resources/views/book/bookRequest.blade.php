@extends('layouts.adminpanel')

@section('title', "Book Request")

@section('content_title', "Book Request")

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
    @foreach($books as $book)
      <tr>
        <td><a href="{{asset('books/view/'.$book->id)}}"> {{ $book->file_name }}</a></td>
        <td><a href="{{asset('author/'.$users[$i]->id)}}">{{ $users[$i]->first_name }} {{ $users[$i]->last_name }}</td>
        <td>{{ $category[$i++]->catagory_name }}</td>
        
        <td>
          <a href="{{asset('/bookrequest/accept/'.$book->id)}}" class="btn btn-success">Accept</a>
          <a href="{{asset('/bookrequest/reject/'.$book->id)}}" class="btn btn-danger">Reject</a>
        </td>
      </tr>
  
    @endforeach
  </tbody>
</table>

<div class="text-center">{{ $books->links() }}</div>

@endsection
