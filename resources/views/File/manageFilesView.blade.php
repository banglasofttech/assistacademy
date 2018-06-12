@extends('layouts.layout')

@section('title', "Manage Files")

@section('content_title', "Manage Files")

@section('content')
  <table class="table table-striped">
    <thead class="thead-dark">
      <tr>
        <th>Section</th>
        <th>Total Files</th>
        <th>Last Upload</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
       
        <tr>
          <td>Books</td>
          <td>{{ $total_book }}</td>
          <td>
            @if($last_book!=null)
              {{ $last_book->created_at }}
            @endif

          </td>
          <td>
            <a href="/managefiles/books" class="btn btn-warning">Manage</a>
          </td>
        </tr>
      <tr>
        <td>Videos</td>
        <td>{{ $total_video }}</td>
        <td>
          @if($last_video!=null)
              {{ $last_video->created_at }}
          @endif
        </td>
        <td>
          <a href="/managefiles/videos" class="btn btn-warning">Manage</a>
        </td>
      </tr>
      <tr>
        <td>PPTs</td>
        <td>{{ $total_ppt }}</td>
        <td>
          @if($last_ppt!=null)
              {{ $last_ppt->created_at }}
          @endif
        </td>
        <td>
          <a href="/managefiles/ppts" class="btn btn-warning">Manage</a>
        </td>
      </tr>
    </tbody>
  </table>

@endsection
