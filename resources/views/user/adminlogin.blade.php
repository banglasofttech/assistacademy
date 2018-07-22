<link href="{{asset('content/css/bootstrap.css')}}" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="{{asset('content/css/login.css')}}">
<script src="{{ asset('content/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('content/js/jquery.min.js') }}"></script>

<div class="container">
  
  <div class="row" id="pwd-container">
    <div class="col-md-4"></div>
    
    <div class="col-md-4">
      <section class="login-form">
        <form method="post" action="{{route('login')}}" role="login">
          {{ csrf_field() }}

          <h1 class="text-primary text-center item-heading">Admin Panel</h1>

          @if (count($errors) > 0)
            <p class="bg-danger text-white text-center">
                @foreach($errors->all() as $error)
                    {{$error}}
                    <br>
                @endforeach
            </p>
          @endif

          <input type="hidden" id="user_type" name="user_type" value="admin">

          <input type="email" name="email" placeholder="Email" required class="form-control input-lg"/>
          
          <input type="password" class="form-control input-lg" id="password" name="password" placeholder="Password" required="" />
          
          
          <div class="pwstrength_viewport_progress"></div>
          
          
          <button type="submit" name="go" class="btn btn-lg btn-primary btn-block">Sign in</button>
          
        </form>
      </section>  
      </div>
      
      <div class="col-md-4"></div>
      

  </div>      
</div>
