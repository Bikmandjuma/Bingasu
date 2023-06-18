<?php
  use App\Models\AdminSocialMedia;
  use App\Models\Admin;

  $admin_media=AdminSocialMedia::all();
  $admin_fname=Admin::get('firstname');
  $customer_id=auth()->guard('customer')->user()->id;
  $incrypted_id=Crypt::encryptString($customer_id);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <title>Bingasu home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="author" content="Untree.co" />
    <link rel="shortcut icon" href="favicon.png" />

    <meta name="description" content="" />
    <meta name="keywords" content="bootstrap, bootstrap5" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="../../fonts/icomoon/style.css" />
    <link rel="stylesheet" href="../../fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="../../css/tiny-slider.css" />
    <link rel="stylesheet" href="../../css/aos.css" />
    <link rel="stylesheet" href="../../css/style.css" />
    <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <style type="text/css">
      #type-category{
        margin-top:-50px;
      }

      #type-category #type{
        background-color:white;color: green; padding:10px;margin-left:-30px;
      }

      #type-category #category{
        background-color:white;color: green; padding:10px;margin-left:0px;
      }

      #agent_info{
        box-shadow:0px 0px 10px 0px rgba(0, 0, 0, 0.2);
        padding:20px;
        border-radius: 10px;
      }

      /*Customer account management*/
      #account_info_container{
        padding:20px;
        border-radius: 20px;
        box-shadow:0px 0px 20px 0px rgba(0, 0, 0, 0.2);
        text-align: center;
        justify-items: center;
        justify-content: cente;
      }


      #account_info_container i{
        font-size: 20px;
        margin-top: 15px;
      }

       #EmailIconId:hover,#PhoneIconId:hover,#NameIconId:hover{
        cursor: pointer;
       }

      #idSubmit1,#idSubmit2,#idSubmit3{
        display: relative;
        margin-left: -25px;
        color:teal;
        border-radius:0px 10px 10px 0px;
      }

      #Cansel1,#Cansel2,#Cansel3{color: red;}
      #Cansel1:hover,#Cansel2:hover,#Cansel3:hover{cursor: pointer;}

      #ShowPswd1,#ShowPswd2,#ShowPswd3,#ShowPswdSlash1,#ShowPswdSlash2,#ShowPswdSlash3{
          margin-top:10px;margin-left: -25px;
      }

      #ShowPswd1:hover,#ShowPswd2:hover,#ShowPswd3:hover,#ShowPswdSlash1:hover,#ShowPswdSlash2:hover,#ShowPswdSlash3:hover{
          cursor: pointer;
      }

    .alert{
      padding: 15px;
      margin-bottom: 20px;border-radius: 4px;color: #fff;text-transform: uppercase;font-size: 12px}.alert_info{background-color: #4285f4;border: 2px solid #4285f4}button.close{-webkit-appearance: none;padding: 0;cursor: pointer;background: 0 0;border: 0}.close{font-size: 20px;color: #fff;opacity: 0.9;}.alert_success{background-color: #09c97f;border: 2px solid #09c97f}.alert_warning{background-color: #f8b15d;border: 2px solid #f8b15d}.alert_error{background-color: #f95668;border: 2px solid #f95668}.fade_info{background-color: #d9e6fb;border: 1px solid #4285f4}.fade_info .close{color: #4285f4}.fade_info strong{color: #4285f4}.fade_success{background-color: #c9ffe5;border: 1px solid #09c97f}.fade_success .close{color: #09c97f}.fade_success strong{color: #09c97f}.fade_warning{background-color: #fff0cc;border: 1px solid #f8b15d}.fade_warning .close{color: #f8b15d}.fade_warning strong{color: #f8b15d}.fade_error{background-color: #ffdbdb;border: 1px solid #f95668}.fade_error .close{color: #f95668}.fade_error strong{color: #f95668}
    </style>
    <title>{{config('app.name','')}}</title>
  </head>
  <body>
    <div class="site-mobile-menu site-navbar-target">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close">
          <span class="icofont-close js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div>

    <nav class="site-nav">
      <div class="container">
        <div class="menu-bg-wrap">
          <div class="site-navigation">
            <a href="index.html" class="logo m-0 float-start">{{config('app.name','')}}</a>
            <ul class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end">
              <li class="active"><a href="{{url('customer/dashboards/')}}/{{$incrypted_id}}"><i class="icon-home"></i>&nbsp;Home</a></li>
              <li class="active"><a href="#"><i class="icon-money"></i>&nbsp;Buy/Rent Property</a></li>
              <li class="active"><a href="{{url('Service')}}"><i class="icon-wrench"></i>&nbsp;Services</a></li>
              <li class="active"><a href="{{url('About')}}"><i class="icon-list-alt"></i>&nbsp;About Us</a></li>
              <li class="active"><a href="#"><i class="icon-list-alt"></i>&nbsp;Booking <span style="padding:2px 2px 2px 2px;background-color:red;color:white;border-radius:5px;justify-content: center;">0</span> </a></li>
              <li class="active"><a href="{{url('customer/Contact/Admin/')}}"><i class="icon-phone"></i>&nbsp;Contact Us</a></li>
              <li class="has-children active">
                <?php
                  $name=auth()->guard('customer')->user()->fullname;
                  $Cust_name=substr($name,0,10);
                  if (strlen($name) >= 10) {
                      $fullname=$Cust_name."...";
                  }else{
                      $fullname=$name;
                  }
                ?>
                <a href="#"><i class="icon-user"></i>&nbsp;<b>{{$fullname}}</b></a>                
                <ul class="dropdown">
                  <li><a href="{{route('ManageAccount')}}"><i class="icon-user"></i>&nbsp;Account</a></li>
                  <li class="active"><a href="{{route('ClientLogout')}}"><i class="icon-lock"></i>&nbsp;Logout</a></li>
                </ul>
              </li>

              
            </ul>

            <a
              href="#"
              class="burger light me-auto float-end mt-1 site-menu-toggle js-menu-toggle d-inline-block d-lg-none"
              data-toggle="collapse"
              data-target="#main-navbar"
            >
              <span></span>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <main>
      @yield('content')
    </main>

    @foreach($admin_media as $media)
     <div class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="widget">
              <h3>Contact</h3>
              <address>{{$media->address}}</address>
              <ul class="list-unstyled links">
                <li><a href="tel:11234567890" target="_blank">{{$media->phone}}</a></li>
                <li>
                  <a href="mailto:info@mydomain.com" target="_blank">{{$media->email}}</a>
                </li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <div class="widget">
              <h3>Sources</h3>
              <ul class="list-unstyled float-start links">
                <li><a href="#">About us</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Vision</a></li>
                <li><a href="#">Mission</a></li>
                <li><a href="#">Terms</a></li>
                <li><a href="#">Privacy</a></li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
          <div class="col-lg-4">
            <div class="widget">
              <h3>Links</h3>
              <ul class="list-unstyled links">
                <li><a href="#">Our Vision</a></li>
                <li><a href="#">About us</a></li>
                <li><a href="#">Contact us</a></li>
              </ul>

              <ul class="list-unstyled social">
                <li>
                  <a href="{{$media->instagram}}"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="{{$media->twitter}}"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="{{$media->facebook}}"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="{{$media->linkdin}}"><span class="icon-linkedin"></span></a>
                </li>
                <li>
                  <a href="https://wa.me/:+25{{$media->whatsapp}}" target="_blank"><span class="icon-whatsapp"></span></a>
                </li>
                <li>
                  <a href="tel:+25{{$media->whatsapp}}"><span class="icon-phone"></span></a>
                </li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->
      @endforeach
      <!--end of social media data-->
      
      @foreach($admin_fname as $ad_fname)
        <div class="row mt-5">
          <div class="col-12 text-center">
            <p>
              Copyright &copy;2022 - <script>document.write(new Date().getFullYear());</script>
              . All Rights Reserved. &mdash; Designed with love by
              <a href="#">{{$ad_fname->firstname}}</a>
            </p>
          </div>
        </div>
      </div>

      @endforeach
      <!-- /.container -->
    </div>
    <!-- /.site-footer -->

    <!-- Preloader -->
    <!-- <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div> -->

    <script src="../../js/bootstrap.bundle.min.js"></script>
    <script src="../../js/tiny-slider.js"></script>
    <script src="../../js/aos.js"></script>
    <script src="../../js/navbar.js"></script>
    <script src="../../js/counter.js"></script>
    <script src="../../js/custom.js"></script>
  </body>
</html>
