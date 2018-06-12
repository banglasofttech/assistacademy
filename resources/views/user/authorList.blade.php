@extends('layouts.adminpanel')

@section('title', "Author/Trainer List")

@section('content_title', "Author/Trainer List")

@section('content')

  <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <?php
      $profileLink='/author/'.$user->id;
    ?>
      <tr>
        <input type="hidden"  id="request_user_id" value="{{ $user->id }}" >
        <td><a href={{ $profileLink }}> {{ $user->first_name }} {{ $user->last_name }}</a></td>
        <td>{{ $user->email }}</td>
        
        <td id="accept_reject_author">
          <a href="/removeauthor/{{ $user->id }}" class="btn btn-danger" id="remove_author_button">Remove Author</a>
        </td>

        <td id="undo_section" style="display: none">
          <span id="admin_action_message" class="text-danger">Accepted</span>
          <a href="#" class="btn btn-primary" id="undo_admin_action_button">Undo</a>
        </td>
      </tr>
    @endforeach
  </tbody>

</table>

<div class="text-center">{{ $users->links() }}</div>
	

@endsection
