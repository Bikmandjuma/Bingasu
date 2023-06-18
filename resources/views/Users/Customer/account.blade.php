@extends('Users.Customer.Cover')
@section('content')
<?php
  use App\Models\AdminSocialMedia;
  $admin_media=AdminSocialMedia::all();
  $name=auth()->guard('customer')->user()->fullname;
  $email=auth()->guard('customer')->user()->email;
?>
    <div
      class="hero page-inner overlay"
      style="background-image: url('../../images/hero_bg_2.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Manage Account</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  Account
                </li>
              </ol>
            </nav>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row">
          <div
            class="col-lg-6 mb-5 mb-lg-0 text-center"
            data-aos="fade-up"
            data-aos-delay="100"
          >

        @if(session('fullname_changed'))
            <script type="text/javascript">toastr.success("fullname changed well ")</script>';
        @endif

         @if(session('phone_changed'))
            <script type="text/javascript">toastr.success("fullname changed well ")</script>';
        @endif

         @if(session('email_changed'))
            <script type="text/javascript">toastr.success("fullname changed well ")</script>';
        @endif

            <div id="account_info_container" class="text-center">
                <h4>Your information</h4>
                    <form style="display: flex;" method="POST" action="{{route('UpdateFullName')}}">
                      @csrf
                      <i class="icon-user"></i>&nbsp;&nbsp;<input type="text" name="fullname" value="{{auth()->guard('customer')->user()->fullname}}" class="form-control" style="display:none;" id="inputid11" autofocus required> <input type="text" class="form-control" name="fname" placeholder="{{auth()->guard('customer')->user()->fullname}}" disabled id="inputid12" >&nbsp;<i class="icon-edit text-primary" title="edit name -> {{auth()->guard('customer')->user()->fullname}}" onclick="ClickIconName()" id="NameIconId"></i>
                      <button style="display:none;border: none;" type="submit" name="SubmitFullName" id="idSubmit1" title="save changes">
                        <i class="icon-save"></i>
                      </button>
                      <i class="icon-times" style="display:none;" id="Cansel1" title="Cansel" onclick="CanselInputChanges1()"></i>
                    </form>
                  <br>
                    <form style="display: flex;" method="POST" action="{{route('UpdatePhone')}}">
                      @csrf
                      <i class="icon-phone"></i>&nbsp;&nbsp;<input type="number" name="phone" value="{{auth()->guard('customer')->user()->phone}}" class="form-control" style="display:none;" id="inputid21" autofocus required> <input type="text" class="form-control" placeholder="{{auth()->guard('customer')->user()->phone}}" disabled id="inputid22" >&nbsp;<i class="icon-edit text-primary" title="edit name -> {{auth()->guard('customer')->user()->phone}}" onclick="ClickIconPhone()" id="PhoneIconId"></i>
                      <button style="display:none;border: none;" type="submit" name="SubmitPhone" id="idSubmit2" title="save changes">
                        <i class="icon-save"></i>
                      </button>
                      <i class="icon-times" style="display:none;" id="Cansel2" title="Cansel" onclick="CanselInputChanges2()"></i>
                    </form>
                  <br>
                    <form style="display: flex;" method="POST" action="{{route('UpdateEmail')}}">
                      @csrf
                      <i class="icon-phone"></i>&nbsp;&nbsp;<input type="email" name="email" value="{{auth()->guard('customer')->user()->email}}" class="form-control" style="display:none;" id="inputid31" autofocus required> <input type="text" class="form-control" placeholder="{{auth()->guard('customer')->user()->email}}" disabled id="inputid32" >&nbsp;<i class="icon-edit text-primary" title="edit name -> {{auth()->guard('customer')->user()->email}}" onclick="ClickIconEmail()" id="EmailIconId"></i>
                      <button style="display:none;border: none;" type="submit" name="SubmitPhone" id="idSubmit3" title="save changes">
                        <i class="icon-save"></i>
                      </button>
                      <i class="icon-times" style="display:none;" id="Cansel3" title="Cansel" onclick="CanselInputChanges3()"></i>
                    </form>
            </div>

          </div>

          <div
            class="col-lg-6 mb-7 mb-lg-0 text-center"
            data-aos="fade-up"
            data-aos-delay="100"
          >

             @if($errors->any())
                <div style="margin-top:5px;" class="alert btn-danger alert-dismissible fade show text-center" role="alert">
                   {{$count=1}}
                    @foreach($errors->all() as $error)
                        {{$count++}} ) {{$error}}<br>
                    @endforeach
                   <!--  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true" style="font-size:25px;">&times;</span>
                    </button> -->
                </div>
            @endif

            <div id="account_info_container" class="text-center">
                <h4>Modify password <i class="icon-key"></i> </h4>
                <form class="form-group" method="POST" action="{{route('CreatePassword')}}">
                  @csrf
                  <br><!-- 
                  <span class="btn-show-pass">
                    <i class="fa fa-eye"></i>
                  </span> -->
                  <div class="d-flex">
                    <input type="password" name="old_password" placeholder="Current Password" class="form-control" id="pswdid1">
                    <i class="icon-eye-slash" id="ShowPswd1" onclick="ShowPswdFn1()"></i>
                    <i class="icon-eye" id="ShowPswdSlash1" onclick="ShowPswdFn11()" style="display:none;"></i>
                  </div>
                  <br>
                  <div class="d-flex">
                    <input type="password" name="new_password" placeholder="New Password" class="form-control" id="pswdid2"><br>
                    <i class="icon-eye-slash" id="ShowPswd2" onclick="ShowPswdFn2()"></i>
                    <i class="icon-eye" id="ShowPswdSlash2" onclick="ShowPswdFn22()" style="display:none;"></i>

                  </div>
                  <br>
                  <div class="d-flex">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="confirm New Password" id="pswdid3">
                    <i class="icon-eye-slash" id="ShowPswd3" onclick="ShowPswdFn3()"></i>
                    <i class="icon-eye" id="ShowPswdSlash3" onclick="ShowPswdFn33()" style="display:none;"></i>

                  </div>
                    <br>
                  <button class="btn btn-primary" type="submit" name="submit_pswd"><i class="icon-save"></i> &nbsp;Save changes</button>
                </form>

            </div>
            
          </div>

        </div>
      </div>
    </div>
    <!-- /.untree_co-section -->

    <script type="text/javascript">

      //about fulname
      function ClickIconName(){
          var input11=document.getElementById('inputid11');
          var input12=document.getElementById('inputid12');
          var idsubmit=document.getElementById('idSubmit1');
          var cansel=document.getElementById('Cansel1');
          var hideCurrentInput=document.getElementById('NameIconId');

          input12.style.display="none";
          hideCurrentInput.style.display="none";
          input11.style.display="block";
          idsubmit.style.display="block";
          cansel.style.display="block";

      }

      function CanselInputChanges1(){
          var input11=document.getElementById('inputid11');
          var input12=document.getElementById('inputid12');
          var idsubmit=document.getElementById('idSubmit1');
          var cansel=document.getElementById('Cansel1');
          var hideCurrentInput=document.getElementById('NameIconId');

          input12.style.display="block";
          hideCurrentInput.style.display="block";
          input11.style.display="none";
          idsubmit.style.display="none";
          cansel.style.display="none";
      }


      //about phone
      function ClickIconPhone(){
          var input21=document.getElementById('inputid21');
          var input22=document.getElementById('inputid22');
          var idsubmit=document.getElementById('idSubmit2');
          var cansel=document.getElementById('Cansel2');
          var hideCurrentInput=document.getElementById('PhoneIconId');

          input22.style.display="none";
          hideCurrentInput.style.display="none";
          input21.style.display="block";
          idsubmit.style.display="block";
          cansel.style.display="block";

      }

      function CanselInputChanges2(){
          var input21=document.getElementById('inputid21');
          var input22=document.getElementById('inputid22');
          var idsubmit=document.getElementById('idSubmit2');
          var cansel=document.getElementById('Cansel2');
          var hideCurrentInput=document.getElementById('PhoneIconId');

          input22.style.display="block";
          hideCurrentInput.style.display="block";
          input21.style.display="none";
          idsubmit.style.display="none";
          cansel.style.display="none";
      }

       //about email
      function ClickIconEmail(){
          var input31=document.getElementById('inputid31');
          var input32=document.getElementById('inputid32');
          var idsubmit=document.getElementById('idSubmit3');
          var cansel=document.getElementById('Cansel3');
          var hideCurrentInput=document.getElementById('EmailIconId');

          input32.style.display="none";
          hideCurrentInput.style.display="none";
          input31.style.display="block";
          idsubmit.style.display="block";
          cansel.style.display="block";

      }

      function CanselInputChanges3(){
          var input31=document.getElementById('inputid31');
          var input32=document.getElementById('inputid32');
          var idsubmit=document.getElementById('idSubmit3');
          var cansel=document.getElementById('Cansel3');
          var hideCurrentInput=document.getElementById('EmailIconId');

          input32.style.display="block";
          hideCurrentInput.style.display="block";
          input31.style.display="none";
          idsubmit.style.display="none";
          cansel.style.display="none";
      }

    //password js codes
    function ShowPswdFn1(){
      var x=document.getElementById('pswdid1');

      if (x.type === "password") {
        x.type = "text";
        document.getElementById('ShowPswdSlash1').style.display="block";
        document.getElementById('ShowPswd1').style.display="none";
      }else{
        x.type="password";
      }

    }

    function ShowPswdFn11(){
      var x=document.getElementById('pswdid1');

      if (x.type === "text") {
        x.type = "password";
        document.getElementById('ShowPswdSlash1').style.display="none";
        document.getElementById('ShowPswd1').style.display="block";
      }else{
        x.type="password";
      }

    }


    function ShowPswdFn2(){
      var x=document.getElementById('pswdid2');

      if (x.type === "password") {
        x.type = "text";
        document.getElementById('ShowPswdSlash2').style.display="block";
        document.getElementById('ShowPswd2').style.display="none";
      }else{
        x.type="password";
      }

    }

    function ShowPswdFn22(){
      var x=document.getElementById('pswdid2');

      if (x.type === "text") {
        x.type = "password";
        document.getElementById('ShowPswdSlash2').style.display="none";
        document.getElementById('ShowPswd2').style.display="block";
      }else{
        x.type="text";
      }

    }

    function ShowPswdFn3(){
      var x=document.getElementById('pswdid3');

      if (x.type === "password") {
        x.type = "text";
        document.getElementById('ShowPswdSlash3').style.display="block";
        document.getElementById('ShowPswd3').style.display="none";
      }else{
        x.type="password";
      }

    }

    function ShowPswdFn33(){
      var x=document.getElementById('pswdid3');

      if (x.type === "text") {
        x.type = "password";
        document.getElementById('ShowPswdSlash3').style.display="none";
        document.getElementById('ShowPswd3').style.display="block";
      }else{
        x.type="text";
      }

    }
    </script>

@endsection