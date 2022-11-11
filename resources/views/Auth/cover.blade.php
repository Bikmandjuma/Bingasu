<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Bingasu account</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/icon/favicon.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    <style type="text/css">
      .alert{padding: 15px;margin-bottom: 20px;border-radius: 4px;color: #fff;text-transform: uppercase;font-size: 12px}.alert_info{background-color: #4285f4;border: 2px solid #4285f4}button.close{-webkit-appearance: none;padding: 0;cursor: pointer;background: 0 0;border: 0}.close{font-size: 20px;color: #fff;opacity: 0.9;}.alert_success{background-color: #09c97f;border: 2px solid #09c97f}.alert_warning{background-color: #f8b15d;border: 2px solid #f8b15d}.alert_error{background-color: #f95668;border: 2px solid #f95668}.fade_info{background-color: #d9e6fb;border: 1px solid #4285f4}.fade_info .close{color: #4285f4}.fade_info strong{color: #4285f4}.fade_success{background-color: #c9ffe5;border: 1px solid #09c97f}.fade_success .close{color: #09c97f}.fade_success strong{color: #09c97f}.fade_warning{background-color: #fff0cc;border: 1px solid #f8b15d}.fade_warning .close{color: #f8b15d}.fade_warning strong{color: #f8b15d}.fade_error{background-color: #ffdbdb;border: 1px solid #f95668}.fade_error .close{color: #f95668}.fade_error strong{color: #f95668}

     </style>
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Navbar Start -->
        <div class="container-fluid nav-bar bg-transparent">
            <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
                <a href="index.html" class="navbar-brand d-flex align-items-center text-center">
                    <div class="icon p-2 me-2">
                        <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                    </div>
                    <h1 class="m-0 text-primary">Bingasu</h1>
                </a>
                <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto">
                         <a href="{{url('/')}}" class="nav-item nav-link"><i class="fa fa-home text-primary"></i>&nbsp;Home</a>
                        <a href="about.html" class="nav-item nav-link"><i class="fa fa-wrench text-primary"></i>&nbsp;About</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-page"></i>&nbsp;Property</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="property-list.html" class="dropdown-item">Property List</a>
                                <a href="property-type.html" class="dropdown-item">Property Type</a>
                                <a href="property-agent.html" class="dropdown-item">Property Agent</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="testimonial.html" class="dropdown-item">Testimonial</a>
                                <a href="404.html" class="dropdown-item">404 Error</a>
                            </div>
                        </div>
                        <a href="contact.html" class="nav-item nav-link"><i class="fa fa-phone text-primary"></i>&nbsp;Contact</a>
                        
                    </div>
                    
                </div>
            </nav>
        </div>
        <!-- Navbar End -->

        <!-- Header Start -->
        <div class="container-fluid header bg-white p-0">
            <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
                
                <div class="hero">
                  <div class="hero-slide">
                    <div
                      class="img overlay"
                      style="background-image: url('img/hero_bg_3.jpg')"
                    ></div>
                  </div>

                  <div class="container">
                    <div class="row justify-content-center align-items-center">
                      <div class="col-lg-12 text-center">

                        <main>
                            @yield('content')
                        </main>
                      
                      </div>
                    </div>
                  </div>

                </div>

            </div>
        </div>
        <!-- Header End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>