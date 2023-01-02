<?php 
use App\Models\Agent;
use App\Models\Customer;
use App\Models\Contact;

//Counts number of agents
$agent=Agent::all();
$agent_count=collect($agent)->count();

//Counts number of customers
$customer=Customer::all();
$customer_count=collect($customer)->count();

//Contact mailbox
$mail=Contact::all()->where('deleted',null)->where('unread',null);
$mail_count=collect($mail)->count();

//encription of admin id
$rand=rand(100000,1000000);
$id=Crypt::encryptString(auth()->guard('admin')->user()->id.$rand);

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{config('app.name', '')}}</title>
    <link href="/style/dist/img/favicon.png" rel="icon">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

  <!--w3 style-->
  <link rel="stylesheet" href="/style/dist/w3/w3.css">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="/style/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  <link rel="stylesheet" href="/style/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="/style/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="/style/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/style/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="/style/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/style/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="/style/plugins/summernote/summernote-bs4.min.css">

  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
  <!-- Scripts -->
  <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
  <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>

  <!--Jquery-->
  <script src="/style/ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  <style type="text/css">
  .alert{padding: 15px;margin-bottom: 20px;border-radius: 4px;color: #fff;text-transform: uppercase;font-size: 12px}.alert_info{background-color: #4285f4;border: 2px solid #4285f4}button.close{-webkit-appearance: none;padding: 0;cursor: pointer;background: 0 0;border: 0}.close{font-size: 20px;color: #fff;opacity: 0.9;}.alert_success{background-color: #09c97f;border: 2px solid #09c97f}.alert_warning{background-color: #f8b15d;border: 2px solid #f8b15d}.alert_error{background-color: #f95668;border: 2px solid #f95668}.fade_info{background-color: #d9e6fb;border: 1px solid #4285f4}.fade_info .close{color: #4285f4}.fade_info strong{color: #4285f4}.fade_success{background-color: #c9ffe5;border: 1px solid #09c97f}.fade_success .close{color: #09c97f}.fade_success strong{color: #09c97f}.fade_warning{background-color: #fff0cc;border: 1px solid #f8b15d}.fade_warning .close{color: #f8b15d}.fade_warning strong{color: #f8b15d}.fade_error{background-color: #ffdbdb;border: 1px solid #f95668}.fade_error .close{color: #f95668}.fade_error strong{color: #f95668}

    #agents_data{
      overflow: auto;
    }

    ::-webkit-scrollbar{
      display: none;
    };

     #my_data p{
        display: inline-block;
    }

 </style>
   
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<br>
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand" style="margin-top:-20px;">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>

    <div class="rowtext-center">
      <div class="col-md-12">Admin Panel</div>
    </div>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item" style="margin-top:0px;">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append bg-info text-white">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <div data-toggle="dropdown" class="text-center" style="margin-top:5px; margin-right:0px; cursor:pointer;color:black;"><img src="{{asset('images/admin/'.auth()->guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image" style="width:20px;height:20px;border:2px solid skyblue;margin-left:5px;">
<!--         <p style="font-size: 14px;">Me</p>
 -->        <p style="font-size:13px;"><b>Me</b>&nbsp;<img src="{{URL::to('/')}}/images/down-arrow.png" style="width:10px;height:10px;"></p>
        </div>

        <div class="dropdown-menu dropdown-menu-right bg-info" style="margin-top:5px;margin-right:-15px;border:2px solid white">
           <a href="{{route('AdminManagePassword',$id)}}" class="dropdown-item w3-hover-text-black w3-hover-text-black">
            <i class="fas fa-key mr-2"></i>
            Password
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{url('admin/profile/picture')}}/{{$id}}" class="dropdown-item w3-hover-text-black w3-hover-text-black">
            <i class="fas fa-image mr-2"></i>
           Profile picture
          </a>

          <div class="dropdown-divider"></div>
            <a href="" class="dropdown-item w3-hover-text-black w3-hover-text-black" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-lock mr-2"></i>
             Sign out
            </a>
          </div>
        </div>

      </li>      
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <div class="brand-link text-center">
      <img src="/style/dist/img/icon-deal.png"  style="width: 30px; height: 30px;">
      <span class="brand-text text-white" style="color:white;font-size:20px;"><b>{{config('app.name','')}}</b></span>
    </div>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
            <img src="{{asset('images/admin/'.auth()->guard('admin')->user()->image)}}" class="img-circle elevation-2" alt="User Image" style="width:40px;height:40px;border-radius:50%;border:2px solid white;">
        </div>
        <div class="info" style="font-style:20px;font-family:sans-serif;">
          <b><a href="#" class="d-block">{{auth()->guard('admin')->user()->firstname}}&nbsp;{{auth()->guard('admin')->user()->lastname}}</a></b>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="{{route('AdminHome',$id)}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>

          <!--Citizen management-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-bars"></i>
              <p>
                Homepage
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
      
              <li class="nav-item">
                  <a href="{{route('homepage',$id)}}" class="nav-link">
                    <i class="fas fa-home nav-icon"></i>
                    <p>Home</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{url('admin/AboutUs')}}/{{$id}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>About us</p>
                  </a>
              </li>

              <li class="nav-item">
                <a href="{{url('admin/View/Service')}}/{{$id}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Service</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('admin/contact/mailbox')}}/{{$id}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Contact/mailbox <span class="float-right badge badge-primary">{{$mail_count}}</span> </p>
                </a>
              </li>

            </ul>


          <!--Citizen management-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-wrench"></i>
              <p>
                Creation
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
      
              <li class="nav-item">
                  <a href="{{route('CreateTypeProperty',$id)}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Property type</p>
                  </a>
              </li>

              <li class="nav-item">
                  <a href="{{url('addcategory')}}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Account</p>
                  </a>
              </li>

            </ul>


          </li>


            <!--Arcive management-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-eye"></i>
              <p>
                Views
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
      
              <li class="nav-item">
                <a href="{{url('admin/agent/list')}}/{{$id}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Owner's properties <span class="badge badge-info float-right">{{$agent_count}}</span></p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{url('admin/customer')}}/{{$id}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Customers <span class="badge badge-info float-right">{{$customer_count}}</span></p>
                </a>
              </li>

              <li class="nav-item">
                <a href="" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Properties</p>
                </a>
              </li>

            </ul>
          </li>

           <!--Setting-->
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settings
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>

            <ul class="nav nav-treeview">
      
              <li class="nav-item">
                <a href="{{url('admin/information')}}/{{$id}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>My info</p>
                </a>
              </li>

            </ul>
          </li>

      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper"  style="background-color:lightgrey;">
   
      <main>
          @yield('content')
      </main>

          <!-- Small modal -->
          <div class="modal" id="logoutModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-body text-left">
                  <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4>Logout&nbsp;<i class="fa fa-lock"></i></h4>
                </div><hr>
                <div class="modal-body">
                  <p><i class="fa fa-question-circle"></i> Are you sure , you want to log-off ? <br /></p>
                  <div class="actionsBtns">
                          <input type="hidden" name="${_csrf.parameterName}" value="${_csrf.token}"/>
                          <a href="" class="btn btn-primary" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>

                            <form id="logout-form" action="{{route('Logout')}}" method="post" class="d-none">
                               @csrf
                            </form>
                            
                            <button class="btn btn-danger" data-dismiss="modal">Cancel</button>
                  </div>
                </div>
              </div>
            </div>
          </div>

      <!--end of logout-->
          
    </div>
    <!-- /.content -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="/style/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/style/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="/style/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../style/jquery/jquery.min.js"></script>

<!-- ChartJS -->
<script src="/style/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="/style/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="/style/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="/style/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="/style/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/style/plugins/moment/moment.min.js"></script>
<script src="/style/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="/style/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="/style/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="/style/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE../ App -->
<script src="/style/dist/js/adminlte.js"></script>

<script>
      $(function () {
        // Summernote
        $('#summernote').summernote()

        // CodeMirror
        CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
          mode: "htmlmixed",
          theme: "monokai"
        });
      })
</script>

<!-- AdminLTE for demo purposes >
<script src="../dist/js/demo.js"></script-->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/style/dist/js/pages/dashboard.js"></script>
</body>
</html>
