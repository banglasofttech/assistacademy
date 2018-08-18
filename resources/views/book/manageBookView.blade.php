@extends('layouts.adminpanel')

@section('title', "Manage Books")

@section('content_title', "Manage Books")

@section('content')

      <table class="table table-striped ">
        <thead class="thead-dark">
          <tr>
            <th scope="col">File Name</th>
            <th scope="col">Category</th>
            <th scope="col">Views</th>
            <th scope="col">Users</th>
            <th scope="col">
              @if(Auth::user()->user_type=="author")
                Uploaded At
              @else
                Author
              @endif
            </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($books as $book)
          <?php
            $contentLink='/books/view/'.$book->id;
          ?>
            <tr>
              <input type="hidden"  id="content_id" value="{{ $book->id }}" >
              <td><a href={{ $contentLink }}> {{ $book->file_name }}</a></td>
              <td>{{ $book->catagory_id  }}</td>
              <td>{{ $book->total_view  }}</td>
              <td>{{ $book->users  }}</td>
              <td>
                @if(Auth::user()->user_type=="author")
                  {{ $book->created_at }}
                @else
                  <a href="/author/{{ $book->user_id }}">{{ $book->uploader_email }} </a>
                @endif
              </td>             
              <td>
                <a href="/managefiles/books/edit/{{$book->id}}" class="btn btn-success btn-sm">Edit</a>
                <a href="/managefiles/books/remove/{{$book->id}}" class="btn btn-danger btn-sm">Remove</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">{{ $books->links() }}</div>


@endsection
