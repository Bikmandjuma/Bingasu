<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
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

    <link rel="stylesheet" href="fonts/icomoon/style.css" />
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css" />

    <link rel="stylesheet" href="css/tiny-slider.css" />
    <link rel="stylesheet" href="css/aos.css" />
    <link rel="stylesheet" href="css/style.css" />
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
    <title>
      Property &mdash; Free Bootstrap 5 Website Template by Untree.co
    </title>
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
            <a href="index.html" class="logo m-0 float-start">Bingasu</a>
            <ul
              class="js-clone-nav d-none d-lg-inline-block text-start site-menu float-end"
            >
              <li class="active"><a href="index.html">Home</a></li>
              <li class="has-children">
                <a href="properties.html">Properties</a>
                <ul class="dropdown">
                  <li><a href="#">Buy Property</a></li>
                  <li><a href="#">Sell Property</a></li>
                  <li class="has-children">
                    <a href="#">Dropdown</a>
                    <ul class="dropdown">
                      <li><a href="#">Sub Menu One</a></li>
                      <li><a href="#">Sub Menu Two</a></li>
                      <li><a href="#">Sub Menu Three</a></li>
                    </ul>
                  </li>
                </ul>
              </li>
              <li><a href="services.html">Services</a></li>
              <li><a href="about.html">About</a></li>
              <li><a href="contact.html">Contact Us</a></li>
              <li><a href="add_property.html"><b>Add property</b></a></li>
              <li><a href="login.html">Account</a></li>
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

    <div class="hero">
      <div class="hero-slide">
        <div
          class="img overlay"
          style="background-image: url('images/hero_bg_3.jpg')"
        ></div>
        <div
          class="img overlay"
          style="background-image: url('images/hero_bg_2.jpg')"
        ></div>
        <div
          class="img overlay"
          style="background-image: url('images/hero_bg_1.jpg')"
        ></div>
      </div>

      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center">
            <h1 class="heading" data-aos="fade-up">
              Easiest way to find your dream home
            </h1>
            <form
              action="#"
              class="narrow-w form-search d-flex align-items-stretch mb-3"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <input
                type="text"
                class="form-control px-4"
                placeholder="Your ZIP code or City. e.g. New York"
              />
              <button type="submit" class="btn btn-primary">Search</button>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-lg-6">
            <h2 class="font-weight-bold text-primary heading">
              Popular Properties
            </h2>
          </div>
          <div class="col-lg-6 text-lg-end">
            <p>
              <a
                href="#"
                target="_blank"
                class="btn btn-primary text-white py-3 px-4"
                >View all properties</a
              >
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="property-slider-wrap">
              <div class="property-slider">
                <div class="property-item">
                  <a href="{{route('PropertySingle')}}" class="img">
                    <img src="images/img_1.jpg" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">
                    <div id="type-category">
                      <span id="type">Villa</span>
                      <span id="category">For sell</span>
                    </div><br>
                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>

                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption">2 beds</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption">2 baths</span>
                        </span>
                      </div>

                      <a
                        href="{{route('PropertySingle')}}" class="btn btn-primary py-2 px-3">See details</a
                      >
                    </div>
                  </div>
                </div>
                <!-- .item -->

                <div class="property-item">
                  <a href="{{route('PropertySingle')}}" class="img">
                    <img src="images/img_2.jpg" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">
                    <div id="type-category">
                      <span id="type">Appartment</span>
                      <span id="category">For rent</span>
                    </div><br>

                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>

                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption">2 beds</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption">2 baths</span>
                        </span>
                      </div>

                      <a
                        href="{{route('PropertySingle')}}"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div>
                <!-- .item -->

                <div class="property-item">
                  <a href="{{route('PropertySingle')}}" class="img">
                    <img src="images/img_3.jpg" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">

                    <div id="type-category">
                      <span id="type">Garage</span>
                      <span id="category">For sell</span>
                    </div><br>

                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>

                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption">2 beds</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption">2 baths</span>
                        </span>
                      </div>

                      <a
                        href="{{route('PropertySingle')}}"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div>
                <!-- .item -->

                <div class="property-item">
                  <a href="{{route('PropertySingle')}}" class="img">
                    <img src="images/img_4.jpg" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">

                    <div id="type-category">
                      <span id="type">Home</span>
                      <span id="category">For sell</span>
                    </div><br>

                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>

                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption">2 beds</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption">2 baths</span>
                        </span>
                      </div>

                      <a
                        href="{{route('PropertySingle')}}"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div>
                <!-- .item -->

                <div class="property-item">
                  <a href="{{route('PropertySingle')}}" class="img">
                    <img src="images/img_5.jpg" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">
                  
                    <div id="type-category">
                      <span id="type">Villa</span>
                      <span id="category">For rent</span>
                    </div><br>

                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>

                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption">2 beds</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption">2 baths</span>
                        </span>
                      </div>

                      <a
                        href="property-single.html"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div>
                <!-- .item -->

                <div class="property-item">
                  <a href="{{route('PropertySingle')}}" class="img">
                    <img src="images/img_6.jpg" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">

                    <div id="type-category">
                      <span id="type">Appartment</span>
                      <span id="category">For sell</span>
                    </div><br>

                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>

                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption">2 beds</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption">2 baths</span>
                        </span>
                      </div>

                      <a
                        href="property-single.html"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div>
                <!-- .item -->

                <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="images/img_7.jpg" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">

                    <div id="type-category">
                      <span id="type">Home</span>
                      <span id="category">For sell</span>
                    </div><br>

                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>

                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption">2 beds</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption">2 baths</span>
                        </span>
                      </div>

                      <a
                        href="property-single.html"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div>
                <!-- .item -->

                <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="images/img_8.jpg" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">

                    <div id="type-category">
                      <span id="type">Villa</span>
                      <span id="category">For sell</span>
                    </div><br>

                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>

                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption">2 beds</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption">2 baths</span>
                        </span>
                      </div>

                      <a
                        href="property-single.html"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div>
                <!-- .item -->

                <div class="property-item">
                  <a href="property-single.html" class="img">
                    <img src="images/img_1.jpg" alt="Image" class="img-fluid" />
                  </a>

                  <div class="property-content">

                    <div id="type-category">
                      <span id="type">Villa</span>
                      <span id="category">For sell</span>
                    </div><br>

                    <div class="price mb-2"><span>$1,291,000</span></div>
                    <div>
                      <span class="d-block mb-2 text-black-50"
                        >5232 California Fake, Ave. 21BC</span
                      >
                      <span class="city d-block mb-3">California, USA</span>

                      <div class="specs d-flex mb-4">
                        <span class="d-block d-flex align-items-center me-3">
                          <span class="icon-bed me-2"></span>
                          <span class="caption">2 beds</span>
                        </span>
                        <span class="d-block d-flex align-items-center">
                          <span class="icon-bath me-2"></span>
                          <span class="caption">2 baths</span>
                        </span>
                      </div>

                      <a
                        href="property-single.html"
                        class="btn btn-primary py-2 px-3"
                        >See details</a
                      >
                    </div>
                  </div>
                </div>
                <!-- .item -->
              </div>

              <div
                id="property-nav"
                class="controls"
                tabindex="0"
                aria-label="Carousel Navigation"
              >
                <span
                  class="prev"
                  data-controls="prev"
                  aria-controls="property"
                  tabindex="-1"
                  >Prev</span
                >
                <span
                  class="next"
                  data-controls="next"
                  aria-controls="property"
                  tabindex="-1"
                  >Next</span
                >
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <section class="features-1">
      <div class="container">
        <div class="row">
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="300">
            <div class="box-feature">
              <span class="flaticon-house"></span>
              <h3 class="mb-3">Our Properties</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Voluptates, accusamus.
              </p>
              <p><a href="#" class="learn-more">Learn More</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="500">
            <div class="box-feature">
              <span class="flaticon-building"></span>
              <h3 class="mb-3">Property for Sale</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Voluptates, accusamus.
              </p>
              <p><a href="#" class="learn-more">Learn More</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="400">
            <div class="box-feature">
              <span class="flaticon-house-3"></span>
              <h3 class="mb-3">Real Estate Agent</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Voluptates, accusamus.
              </p>
              <p><a href="#" class="learn-more">Learn More</a></p>
            </div>
          </div>
          <div class="col-6 col-lg-3" data-aos="fade-up" data-aos-delay="600">
            <div class="box-feature">
              <span class="flaticon-house-1"></span>
              <h3 class="mb-3">House for Sale</h3>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                Voluptates, accusamus.
              </p>
              <p><a href="#" class="learn-more">Learn More</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <div class="section sec-testimonials">
      <div class="container">
        <div class="row mb-5 align-items-center">
          <div class="col-md-6">
            <h2 class="font-weight-bold heading text-primary mb-4 mb-md-0">
              Customer Says
            </h2>
          </div>
          <div class="col-md-6 text-md-end">
            <div id="testimonial-nav">
              <span class="prev" data-controls="prev">Prev</span>

              <span class="next" data-controls="next">Next</span>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-4"></div>
        </div>
        <div class="testimonial-slider-wrap">
          <div class="testimonial-slider">
            <div class="item">
              <div class="testimonial">
                <img
                  src="images/person_1-min.jpg"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">James Smith</h3>
                <blockquote>
                  <p>
                    &ldquo;Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at the
                    coast of the Semantics, a large language ocean.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Designer, Co-founder</p>
              </div>
            </div>

            <div class="item">
              <div class="testimonial">
                <img
                  src="images/person_2-min.jpg"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Mike Houston</h3>
                <blockquote>
                  <p>
                    &ldquo;Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at the
                    coast of the Semantics, a large language ocean.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Designer, Co-founder</p>
              </div>
            </div>

            <div class="item">
              <div class="testimonial">
                <img
                  src="images/person_3-min.jpg"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Cameron Webster</h3>
                <blockquote>
                  <p>
                    &ldquo;Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at the
                    coast of the Semantics, a large language ocean.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Designer, Co-founder</p>
              </div>
            </div>

            <div class="item">
              <div class="testimonial">
                <img
                  src="images/person_4-min.jpg"
                  alt="Image"
                  class="img-fluid rounded-circle w-25 mb-4"
                />
                <div class="rate">
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                  <span class="icon-star text-warning"></span>
                </div>
                <h3 class="h5 text-primary mb-4">Dave Smith</h3>
                <blockquote>
                  <p>
                    &ldquo;Far far away, behind the word mountains, far from the
                    countries Vokalia and Consonantia, there live the blind
                    texts. Separated they live in Bookmarksgrove right at the
                    coast of the Semantics, a large language ocean.&rdquo;
                  </p>
                </blockquote>
                <p class="text-black-50">Designer, Co-founder</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section section-4 bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-5">
            <h2 class="font-weight-bold heading text-primary mb-4">
              Let's find home that's perfect for you
            </h2>
            <p class="text-black-50">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
              enim pariatur similique debitis vel nisi qui reprehenderit.
            </p>
          </div>
        </div>
        <div class="row justify-content-between mb-5">
          <div class="col-lg-7 mb-5 mb-lg-0 order-lg-2">
            <div class="img-about dots">
              <img src="images/hero_bg_3.jpg" alt="Image" class="img-fluid" />
            </div>
          </div>
          <div class="col-lg-4">
            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-home2"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">2M Properties</h3>
                <p class="text-black-50">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nostrum iste.
                </p>
              </div>
            </div>

            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-person"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Top Rated Agents</h3>
                <p class="text-black-50">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nostrum iste.
                </p>
              </div>
            </div>

            <div class="d-flex feature-h">
              <span class="wrap-icon me-3">
                <span class="icon-security"></span>
              </span>
              <div class="feature-text">
                <h3 class="heading">Legit Properties</h3>
                <p class="text-black-50">
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Nostrum iste.
                </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row section-counter mt-5">
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="300"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">3298</span></span
              >
              <span class="caption text-black-50"># of Buy Properties</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="400"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">2181</span></span
              >
              <span class="caption text-black-50"># of Sell Properties</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="500"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">9316</span></span
              >
              <span class="caption text-black-50"># of All Properties</span>
            </div>
          </div>
          <div
            class="col-6 col-sm-6 col-md-6 col-lg-3"
            data-aos="fade-up"
            data-aos-delay="600"
          >
            <div class="counter-wrap mb-5 mb-lg-0">
              <span class="number"
                ><span class="countup text-primary">7191</span></span
              >
              <span class="caption text-black-50"># of Agents</span>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="section">
      <div class="row justify-content-center footer-cta" data-aos="fade-up">
        <div class="col-lg-7 mx-auto text-center">
          <h2 class="mb-4">Be a part of our growing real state agents</h2>
          <p>
            <a
              href="#"
              target="_blank"
              class="btn btn-primary text-white py-3 px-4"
              >Apply for Real Estate agent</a
            >
          </p>
        </div>
        <!-- /.col-lg-7 -->
      </div>
      <!-- /.row -->
    </div>

    <div class="section section-5 bg-light">
      <div class="container">
        <div class="row justify-content-center text-center mb-5">
          <div class="col-lg-6 mb-5">
            <h2 class="font-weight-bold heading text-primary mb-4">
              Our Agents
            </h2>
            <p class="text-black-50">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Numquam
              enim pariatur similique debitis vel nisi qui reprehenderit totam?
              Quod maiores.
            </p>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="h-100 person">
              <img
                src="images/person_1-min.jpg"
                alt="Image"
                class="img-fluid"
              />

              <div class="person-contents">
                <h2 class="mb-0"><a href="#">James Doe</a></h2>
                <span class="meta d-block mb-3">Real Estate Agent</span>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Facere officiis inventore cumque tenetur laboriosam, minus
                  culpa doloremque odio, neque molestias?
                </p>

                <ul class="social list-unstyled list-inline dark-hover">
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-twitter"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-facebook"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-linkedin"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-instagram"></span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="h-100 person">
              <img
                src="images/person_2-min.jpg"
                alt="Image"
                class="img-fluid"
              />

              <div class="person-contents">
                <h2 class="mb-0"><a href="#">Jean Smith</a></h2>
                <span class="meta d-block mb-3">Real Estate Agent</span>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Facere officiis inventore cumque tenetur laboriosam, minus
                  culpa doloremque odio, neque molestias?
                </p>

                <ul class="social list-unstyled list-inline dark-hover">
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-twitter"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-facebook"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-linkedin"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-instagram"></span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="h-100 person">
              <img
                src="images/person_3-min.jpg"
                alt="Image"
                class="img-fluid"
              />

              <div class="person-contents">
                <h2 class="mb-0"><a href="#">Alicia Huston</a></h2>
                <span class="meta d-block mb-3">Real Estate Agent</span>
                <p>
                  Lorem ipsum dolor sit amet consectetur adipisicing elit.
                  Facere officiis inventore cumque tenetur laboriosam, minus
                  culpa doloremque odio, neque molestias?
                </p>

                <ul class="social list-unstyled list-inline dark-hover">
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-twitter"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-facebook"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-linkedin"></span></a>
                  </li>
                  <li class="list-inline-item">
                    <a href="#"><span class="icon-instagram"></span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="site-footer">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="widget">
              <h3>Contact</h3>
              <address>43 Raymouth Rd. Baltemoer, London 3910</address>
              <ul class="list-unstyled links">
                <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
                <li>
                  <a href="mailto:info@mydomain.com">info@mydomain.com</a>
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
              <ul class="list-unstyled float-start links">
                <li><a href="#">Partners</a></li>
                <li><a href="#">Business</a></li>
                <li><a href="#">Careers</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">FAQ</a></li>
                <li><a href="#">Creative</a></li>
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
                  <a href="#"><span class="icon-instagram"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-twitter"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-facebook"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-linkedin"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-pinterest"></span></a>
                </li>
                <li>
                  <a href="#"><span class="icon-dribbble"></span></a>
                </li>
              </ul>
            </div>
            <!-- /.widget -->
          </div>
          <!-- /.col-lg-4 -->
        </div>
        <!-- /.row -->

        <div class="row mt-5">
          <div class="col-12 text-center">
            <!-- 
              **==========
              NOTE: 
              Please don't remove this copyright link unless you buy the license here https://untree.co/license/  
              **==========
            -->

            <p>
              Copyright &copy;
              <script>
                document.write(new Date().getFullYear());
              </script>
              . All Rights Reserved. &mdash; Designed with love by
              <a href="https://untree.co">Untree.co</a>
              <!-- License information: https://untree.co/license/ -->
            </p>
            <div>
              Distributed by
              <a href="https://themewagon.com/" target="_blank">themewagon</a>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container -->
    </div>
    <!-- /.site-footer -->

    <!-- Preloader -->
    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="visually-hidden">Loading...</span>
      </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/tiny-slider.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/navbar.js"></script>
    <script src="js/counter.js"></script>
    <script src="js/custom.js"></script>
  </body>
</html>
