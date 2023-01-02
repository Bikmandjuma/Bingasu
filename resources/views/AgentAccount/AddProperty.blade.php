@extends('AgentAccount.cover')
@section('content')
<br>
    <div id="login-page" style="background-color:lightgrey;">
                  @if(session('error'))
                      <br>
                      <div class="alert alert_error" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                        <strong>{{session('error')}}</strong>
                      </div>
                  @endif

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
      

                  <!--Crd of agent create account-->
                  <div class="card">
                      <form action="{{route('CreateAgent')}}" method="POST" enctype="multipart/form-data">
                       {!! csrf_field() !!}

                          <div class="card-header bg-info text-white text-center">
                              <h4 class=" text-white">Register as <span style="color:#eee;" id="blink"> one to sell property </span> </h4>
                          </div>

                          <div class="card-header bg-light text-center">
                              <b>or &nbsp;&nbsp;&nbsp;<a href="{{route('CustomerCreateAccount')}}" style="color:white;padding:5px;" class="bg-info">You buy/rent property</a></b>
                          </div>

                      <div class="card-body">
                          <div class="form-group">
                            <div class="row">
                              <div class="col-md-6">

                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" placeholder="Enter firstname" value="{{old('firstname')}}" autofocus name="firstname">
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-user"></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="col-md-6">
            
                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" placeholder="Enter lastname" value="{{old('lastname')}}" name="lastname">
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-user"></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>

                            <div class="row">
                              <div class="col-md-6">

                               <div class="input-group mb-3">
                                
                                  <select name="gender" class="form-control">
                                    <option value="">Gender . .  </option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                  </select>
                                  
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-user"></span>
                                    </div>
                                  </div>
                                </div>

                               
                              </div>
                              <div class="col-md-6">
                                <div class="input-group mb-3">
                                
                                    <div mbsc-page class="demo-country-picker">
                                        <label>
                                            Countries
                                            <input mbsc-input id="demo-country-picker" data-dropdown="true" data-input-style="box" name="country" data-label-style="stacked" placeholder="Please select..." class="form-control" />
                                        </label>
                                    </div>

      

                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-home"></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-md-6">

                                <div class="input-group mb-3">
                                  <input type="email" class="form-control" placeholder="Enter email" value="{{old('email')}}" name="email">
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-envelope"></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="col-md-6">

                                <div class="input-group mb-3">
                                  <input type="text" class="form-control" placeholder="Enter phone" value="{{old('phone')}}" name="phone">
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-phone"></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                            
                            <div class="row">
                              <div class="col-md-6">

                                <div class="input-group mb-3">
                                  <input type="password" class="form-control" placeholder="Enter password" value="{{old('password')}}" name="password">
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-lock"></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                              <div class="col-md-6">

                                <div class="input-group mb-3">

                                  <input type="password" class="form-control" placeholder="Re_enter password" value="{{old('password_confirmation')}}" name="password_confirmation">
                                  <div class="input-group-append">
                                    <div class="input-group-text">
                                      <span class="fas fa-lock"></span>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                            
                          </div>

                          <br>

                          <div class="row">
                              <div class="col-md-12 text-center">
                                  <button type="submit" class="btn btn-info"><i class="fa fa-save"></i>&nbsp;Sign up</button>
                              </div>
                          </div>  

                          <hr>

                          <p class="mb-1 text-center">
                              <i class="fa fa-user"></i>&nbsp;<a href="{{route('Login')}}" class="text-center">Already have account &nbsp;<span style="color: black;">Login here </span>!</a>
                          </p>

                      </form>

                      </div>
                  </div>

    </div>


    <script>
        
        mobiscroll.setOptions({
        locale: mobiscroll.localeEn,   // Specify language like: locale: mobiscroll.localePl or omit setting to use default
        theme: 'ios',                  // Specify theme like: theme: 'ios' or omit setting to use default
        themeVariant: 'light'          // More info about themeVariant: https://docs.mobiscroll.com/5-20-1/javascript/select#opt-themeVariant
    });
    
    var inst = mobiscroll.select('#demo-country-picker', {
        display: 'anchored',           // Specify display mode like: display: 'bottom' or omit setting to use default
        filter: true,                  // More info about filter: https://docs.mobiscroll.com/5-20-1/javascript/select#opt-filter
        itemHeight: 40,                // More info about itemHeight: https://docs.mobiscroll.com/5-20-1/javascript/select#opt-itemHeight
        renderItem: function (item) {  // More info about renderItem: https://docs.mobiscroll.com/5-20-1/javascript/select#opt-renderItem
            return '<div class="md-country-picker-item">' +
                '<img class="md-country-picker-flag" src="https://img.mobiscroll.com/demos/flags/' + item.data.value + '.png" />' +
                item.display + '</div>';
        }
    });
    
    mobiscroll.util.http.getJson('https://trial.mobiscroll.com/content/countries.json', function (resp) {
        var countries = [];
        for (var i = 0; i < resp.length; ++i) {
            var country = resp[i];
            countries.push({ text: country.text, value: country.value });
        }
        inst.setOptions({ data: countries });
    });
    </script>

@endsection