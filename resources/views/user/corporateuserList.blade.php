@extends('layouts.adminpanel')

@section('title', "Corporate User List")

@section('content_title', "Corporate User List")

@section('content')

  <table class="table table-striped">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Organization</th>
      <th scope="col">Joining Date</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
      <tr>
        <input type="hidden"  id="request_user_id" value="{{ $user->id }}" >
        <td>{{ $user->first_name }} {{ $user->last_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->organization }}</td>
        <td>{{ $user->created_at }}</td>       
      </tr>
    @endforeach
  </tbody>

</table>

<div class="text-center">{{ $users->links() }}</div>
	

@endsection
