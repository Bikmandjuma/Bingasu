@extends('Auth.cover')
@section('content')

<div id="login-page">
    
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
          <h4>Reset password here</h4>
        </div>
        <div class="card-body login-card-body">
          <form action="{{route('ForgotPassword')}}" method="post">
          @csrf
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" value="{{old('email')}}" autofocus name="email">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-2"></div>
              <div class="col-md-8">
                <button type="submit" class="btn btn-info btn-block"><i class="fa fa-paper-plane"></i>&nbsp;Request new password</button>
              </div>
              <div class="col-md-2"></div>
            </div>
          </form>

          <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
          </div>
          <!-- /.social-auth-links -->

          <p class="mb-1 text-center">
            <i class="fas fa-reply"></i>&nbsp;<a href="{{route('Login')}}" class="text-center"> Back to Login</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
    <!-- /.login-box -->

</div>
@endsection