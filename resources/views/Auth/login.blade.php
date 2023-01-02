@extends('Auth.cover')
@section('content')
<br>
<div id="login-page">
    
    @if(session('AgentDeleteAccount'))
        <br>
        <div class="alert alert_error" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
          <strong>{{session('AgentDeleteAccount')}}</strong>
        </div>
    @endif

    @if(session('fail'))
        <br>
        <div class="alert alert_error" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
          <strong>{{session('fail')}}</strong>
        </div>
    @endif

    @if(Session::has('register'))
        <br>
        <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
          <strong>{{Session::get('register')}}</strong>
        </div><br>
    @endif


    <div class="login-box">
      <!-- /.login-logo -->
      @if($errors->any())
          <div class="alert alert_error"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
               @foreach($errors->all() as $error)
                  <ul>
                    <li><b>{{$error}}</b></li>
                  </ul>
                @endforeach
          </div>
      @endif

      <div class="card card-info">
        <div class="card-header bg-info text-white text-center">
          <h4><i class="fa fa-user"></i>&nbsp;Sign in here</h4>
        </div>
        <div class="card-body login-card-body">
          <form action="{{route('postlogin')}}" method="post">
          @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" value="{{old('email')}}" autofocus name="email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" name="password" class="form-control" placeholder="Password">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-4"></div>
              <div class="col-md-4">
                <button type="submit" class="btn btn-info btn-block"><i class="fa fa-lock-open"></i>&nbsp;Sign In</button>
              </div>
              <div class="col-md-4"></div>
            </div>
          </form>

          <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
          </div>
          <!-- /.social-auth-links -->

          <p class="mb-1 text-center">
            <i class="fa fa-wrench"></i>&nbsp;<a href="{{route('AgentCreateAccount')}}" class="text-center">I don't have account</a>&nbsp;&nbsp;-&nbsp;&nbsp;<i class="fa fa-key"></i>&nbsp;<a href="{{route('ForgotPassword')}}">Forgot password</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

</div>
@endsection