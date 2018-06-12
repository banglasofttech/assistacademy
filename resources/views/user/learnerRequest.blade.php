@extends('layouts.adminpanel')

@section('title', "Learner Request")

@section('content_title', "Learner Request")

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
      $id=$user->id;
    ?>
      <tr>
        <input type="hidden"  id="request_user_id" value="{{ $user->id }}" >
        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
        <td>{{ $user->email }}</td>
        
        <td id="accept_reject_author">
          <a href="{{asset('/learnerrequest/accept/'.$user->id)}}" class="btn btn-success" id="accept_author_request_button">Accept</a>
          <a href="{{asset('/learnerrequest/reject/'.$user->id)}}" class="btn btn-danger" id="reject_author_request_button">Reject</a>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>

<div class="text-center">{{ $users->links() }}</div>

@endsection
