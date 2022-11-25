@extends('AgentAccount.cover')
@section('content')
  <div id="login-page" style="background-color:lightgrey;">

      <?php
        if($errors->any()){
      ?>
            <div class="alert alert_error"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                <ul>
                  <?php $count=1;?>
                  @foreach($errors->all() as $error)
                    <li style="list-style-type: none;"><b>{{$count++}} ) {{$error}}</b></li>
                  @endforeach
                </ul>
            </div>
          <?php
        }

      ?>
    <div class="card">
      
        <div class="card-header bg-info text-white text-center">
            <h4 class=" text-white">Register as <span style="color:#eee;" id="blink"> one to buy/rent property</span> </h4>
        </div>

        <div class="card-header bg-light text-center">
            <b>or &nbsp;&nbsp;&nbsp;<a href="{{route('AgentCreateAccount')}}" style="color:white;padding:5px;" class="bg-info">You sell propery</a></b>
        </div>

        <div class="card-body register-card-body">
        <form action="{{route('ClientCreateAccount')}}" method="POST">
        @csrf
          <div class="row">
            <div class="col-md-6">
              
                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Full name" name="fullname" autofocus value="{{old('fullname')}}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user"></span>
                    </div>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Phone" name="phone" value="{{old('phone')}}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                    </div>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <input type="email" class="form-control" placeholder="Email" name="email" value="{{old('email')}}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>

            </div>
            <div class="col-md-6">

                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Password" name="password" value="{{old('password')}}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" placeholder="Re-enter password" name="password_confirmation" value="{{old('password_confirmation')}}">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-lock"></span>
                    </div>
                  </div>
                </div>

              <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                  <button type="submit" class="btn btn-info btn-block"><i class="fa fa-save"></i>&nbsp;Sign up</button>
                </div>
                <div class="col-md-3"></div>
              </div>                            
                

            </div>
          </div>

        </form>

        <div class="social-auth-links text-center">
          <p>- OR -</p>
        </div>

        <p class="mb-1 text-center">
            <i class="fa fa-user"></i>&nbsp;<a href="{{route('Login')}}" class="text-center">Already have account !</a>
        </p>

      </div>
      <!-- /.form-box -->
    </div><!-- /.card -->
  </div>

@endsection