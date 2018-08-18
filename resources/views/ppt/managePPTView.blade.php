@extends('layouts.adminpanel')

@section('title', "Manage PPTs")

@section('content_title', "Manage PPTs")

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
          @foreach($ppts as $ppt)
          <?php
            $contentLink='/ppts/view/'.$ppt->id;
          ?>
            <tr>
              <input type="hidden"  id="content_id" value="{{ $ppt->id }}" >
              <td><a href={{ $contentLink }}> {{ $ppt->file_name }}</a></td>
              <td>{{ $ppt->catagory_id  }}</td>
              <td>{{ $ppt->total_view  }}</td>
              <td>{{ $ppt->users  }}</td>
              <td>
                @if(Auth::user()->user_type=="author")
                  {{ $ppt->created_at }}
                @else
                  <a href="/author/{{ $ppt->user_id }}">{{ $ppt->uploader_email }} </a>
                @endif
              </td>             
              <td>
                <a href="/managefiles/ppts/edit/{{$ppt->id}}" class="btn btn-success btn-sm">Edit</a>
                <a href="/managefiles/ppts/remove/{{$ppt->id}}" class="btn btn-danger btn-sm">Remove</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">{{ $ppts->links() }}</div>
@endsection
