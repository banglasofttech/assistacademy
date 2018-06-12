@extends('layouts.adminpanel')

@section('title', "Author Request")

@section('content_title', "Author Request")

@section('content')

  <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Occupation</th>
      <th scope="col">Institution</th>
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
        <td>{{ $user->occupation }}</td>
        <td>{{ $user->organization }}</td>
        
        <td id="accept_reject_author">
          <a href="{{asset('/authorrequest/accept/'.$user->id)}}" class="btn btn-success" id="accept_author_request_button">Accept</a>
          <a href="{{asset('/authorrequest/reject/'.$user->id)}}" class="btn btn-danger" id="reject_author_request_button">Reject</a>
        </td>

        <td id="undo_section" style="display: none">
          <span id="admin_action_message" class="text-danger">Accepted</span>
          <a href="#" class="btn btn-primary" id="undo_admin_action_button">Undo</a>
        </td>
      </tr>

      <!-- Modal -->
      <div class="modal fade" id="acceptAuthorModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h3 class="modal-title" id="exampleModalLongTitle">Accept Request</h3>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Do you want to make him/her author ?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
              <a href="/author/{{$user->id}}" id="accept_author_button" class="btn btn-primary">Yes</a>
            </div>
          </div>
        </div>
      </div>
  
    @endforeach
  </tbody>
</table>

<div class="text-center">{{ $users->links() }}</div>

@endsection
