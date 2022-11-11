@extends('auth.cover')
@section('content')

          <div class="row">
              <div class="col-md-3"></div>
              <div class="col-md-6">

                  @if(session('fail'))
                      <br>
                      <div class="alert alert_error" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        <strong>{{session('fail')}}</strong>
                      </div>
                  @endif

                  @if(Session::has('success'))
                      <br>
                      <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        <strong>{{Session::get('success')}}</strong>
                      </div><br>
                  @endif

                  <div class="card">
                      <form action="{{route('postlogin')}}" method="POST">
                       {!! csrf_field() !!}

                          <div class="card-header bg-primary text-white">
                              <h3 class="text-center text-white">Login here</h3>
                          </div>

                      <div class="card-body">
                          <div class="form-group">
                              <input type="email" class="form-control" name="email" placeholder="Enter Email or phone number" autofocus value="{{old('email')}}">

                               <span class="text-danger float-right"> @error('email') {{ $message }}@enderror</span>

                          </div>

                          <br>

                          <div class="form-group">
                              <input type="password" class="form-control" name="password" placeholder="Enter password">

                               <span class="text-danger float-right"> @error('password') {{ $message }}@enderror</span>
                          </div>

                          <br>

                          <div class="row">
                              <div class="col-md-12">
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-lock-open"></i> Login</button>
                              </div>
                          </div>  

                          <hr>

                          <div class="row">
                              <div class="col-md-12">
                                  <a href="forgotpassword.php" class="float-right"><i class="fa fa-user"></i>&nbsp;Create account</a>&nbsp;&nbsp;/&nbsp;&nbsp;<a href="forgotpassword.php" class="float-right"><i class="fa fa-key"></i>&nbsp;Forgot password</a>  
                              </div>
                          </div>

                      </form>

                      </div>
                  </div>

              </div>
              <div class="col-md-3"></div>
            </div>


@endsection