@extends('layouts.adminpanel')

@section('title', "Manage Videos")

@section('content_title', "Manage Videos")

@section('content')

      <table class="table table-striped">
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
          @foreach($videos as $video)
          <?php
            $contentLink='/videos/view/'.$video->id;
          ?>
            <tr>
              <input type="hidden"  id="content_id" value="{{ $video->id }}" >
              <td><a href={{ $contentLink }}> {{ $video->file_name }}</a></td>
              <td>{{ $video->catagory_id  }}</td>
              <td>{{ $video->total_view  }}</td>
              <td>{{ $video->users  }}</td>
              <td>
                @if(Auth::user()->user_type=="author")
                  {{ $video->created_at }}
                @else
                  <a href="/author/{{ $video->user_id }}">{{ $video->uploader_email }} </a>
                @endif
              </td>  
              <td>
                <a href="/managefiles/videos/edit/{{$video->id}}" class="btn btn-success btn-sm">Edit</a>
                <a href="/managefiles/videos/remove/{{$video->id}}" class="btn btn-danger btn-sm">Remove</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">{{ $videos->links() }}</div>


@endsection
