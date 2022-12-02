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
      style="background-image: url('../../images/hero_bg_1.jpg')"
    >
      <div class="container">
        <div class="row justify-content-center align-items-center">
          <div class="col-lg-9 text-center mt-5">
            <h1 class="heading" data-aos="fade-up">Contact Us</h1>

            <nav
              aria-label="breadcrumb"
              data-aos="fade-up"
              data-aos-delay="200"
            >
              <ol class="breadcrumb text-center justify-content-center">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li
                  class="breadcrumb-item active text-white-50"
                  aria-current="page"
                >
                  Contact
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
            class="col-lg-4 mb-5 mb-lg-0"
            data-aos="fade-up"
            data-aos-delay="100"
          >
          @foreach($admin_media as $media)
            <div class="contact-info">
              <div class="address mt-2">
                <i class="icon-room"></i>
                <h4 class="mb-2">Location:</h4>
                <p>
                  {{$media->address}}
                </p>
              </div>

              <div class="open-hours mt-4">
                <i class="icon-clock-o"></i>
                <h4 class="mb-2">Open Hours:</h4>
                <p>
                  Monday-Sunday:<br />
                  24/7
                </p>
              </div>

              <div class="email mt-4">
                <i class="icon-envelope"></i>
                <h4 class="mb-2">Email:</h4>
                <p>{{$media->email}}</p>
              </div>

              <div class="phone mt-4">
                <i class="icon-phone"></i>
                <h4 class="mb-2">Call:</h4>
                <p>{{$media->phone}}</p>
              </div>
            </div>
            @endforeach
          </div>
          <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">
              
              @if(session('contact_sent'))
                  <div class="alert alert_success" style="text-align: center;">
                    <strong>{{session('contact_sent')}}</strong>
                  </div><br>
              @endif

            <form action="{{url('guest/contact')}}" method="POST">
              @csrf
              <div class="row">
                <div class="col-6 mb-3">
                  <input
                    type="text"
                    class="form-control"
                    name="name" placeholder="Your Name" value="{{$name}}">
                    <span style="color:red;">@error('name') {{$message}} @enderror</span>
                </div>
                <div class="col-6 mb-3">
                  <input
                    type="email"
                    class="form-control"
                    placeholder="Your Email" name="email" value="{{$email}}">
                    <span style="color:red;">@error('email') {{$message}} @enderror</span>
                </div>
                <div class="col-12 mb-3">
                  <input
                    type="text"
                    class="form-control"
                    placeholder="Subject"
                    name="subject" value="{{old('subject')}}">
                    <span style="color:red;">@error('subject') {{$message}} @enderror</span>
                </div>
                <div class="col-12 mb-3">
                  <textarea
                    id=""
                    cols="30"
                    rows="4"
                    class="form-control"
                    placeholder="Message"
                    name="message"></textarea>
                    <span style="color:red;">@error('message') {{$message}} @enderror</span>
                </div>

                <div class="col-12">
                  <input
                    type="submit"
                    value="Send Message"
                    class="btn btn-primary"
                  />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.untree_co-section -->
    
@endsection