@extends('layouts.adminpanel')

@section('title', "Manage Trainings")

@section('content_title', "Manage Trainings")

@section('content')

      <table class="table table-striped">
        <thead class="thead-dark">
          <tr>
            <th scope="col">Title</th>
            <th scope="col">Category</th>
            <th scope="col">Views</th>
            <th scope="col">Users</th>
            <th scope="col">
              @if(Auth::user()->user_type=="author")
                Added At
              @else
                Trainer
              @endif
            </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach($trainings as $training)
          <?php
            $contentLink='/training/view/'.$training->id;
          ?>
            <tr>
              <input type="hidden"  id="content_id" value="{{ $training->id }}" >
              <td><a href={{ $contentLink }}> {{ $training->title }}</a></td>
              <td>{{ $training->catagory_id  }}</td>
              <td>{{ $training->total_view  }}</td>
              <td>{{ $training->users  }}</td>
              <td>
                @if(Auth::user()->user_type=="author")
                  {{ $training->created_at }}
                @else
                  <a href="/author/{{ $training->user_id }}">{{ $training->uploader_email }} </a>
                @endif
              </td>             
              <td>
                <a href="/managefiles/training/edit/{{$training->id}}" class="btn btn-success btn-sm">Edit</a>
                <a href="/managefiles/training/remove/{{$training->id}}" class="btn btn-danger btn-sm" id="remove_file_button">Remove</a>
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      <div class="text-center">{{ $trainings->links() }}</div>
@endsection
