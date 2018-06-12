@extends('layouts.layout')

@section('title', "Login")

@section('content') 

<div class="row">
<div class="col-md-4"></div>
    <div class="col-md-4 item-panel">
        <h1 class="text-uppercase text-center item-heading">Login</h1>
      <button type="button" class="btn btn-primary btn-block author-login" data-toggle="modal" data-target="#LoginModal">Login as Trainer/Author/Teacher</button>
      <button type="button" class="btn btn-success btn-block learner-login" data-toggle="modal" data-target="#LoginModal">Login as Learner</button>
      <button type="button" class="btn btn-info btn-block corporate-login" data-toggle="modal" data-target="#LoginModal">Login as Corporate</button>
      <button type="button" class="btn btn-success btn-block"  data-toggle="modal" data-target="#RegistrationModal">Create New Account</button>
  </div>
</div>
  
@endsection
