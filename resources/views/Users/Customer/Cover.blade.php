<?php
use App\Models\AdminSocialMedia;
use App\Models\Admin;

$admin_media=AdminSocialMedia::all();
$admin_fname=Admin::get('firstname');

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
              <li class="active"><a href="{{url('/')}}"><i class="icon-home"></i>&nbsp;Home</a></li>
              <li class="active"><a href="#"><i class="icon-money"></i>&nbsp;Buy/Rent Property</a></li>
              <li class="active"><a href="{{url('Service')}}"><i class="icon-wrench"></i>&nbsp;Services</a></li>
              <li class="active"><a href="{{url('About')}}"><i class="icon-list-alt"></i>&nbsp;About Us</a></li>
              <li class="active"><a href="#"><i class="icon-list-alt"></i>&nbsp;Booking <span style="padding:2px 2px 2px 2px;background-color:red;color:white;border-radius:5px;justify-content: center;">0</span> </a></li>
              <li class="active"><a href="{{url('customer/Contact/Admin')}}"><i class="icon-phone"></i>&nbsp;Contact Us</a></li>
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
                  <li><a href="#" target="_blank"><i class="icon-user"></i>&nbsp;Account</a></li>
                  <li><a href="#" target="_blank"><i class="icon-key"></i>&nbsp;Password</a></li>
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
                <li><a href="tel://11234567890">{{$media->phone}}</a></li>
                <li>
                  <a href="mailto:info@mydomain.com">{{$media->email}}</a>
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
                  <a href="{{$media->whatsapp}}"><span class="icon-whatsapp"></span></a>
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
