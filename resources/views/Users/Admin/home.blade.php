@extends('Users.Admin.cover')
@section('content')

<br>

<div class="container">
    <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{url('es/viewstaff')}}">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>0</h3>
                <p>All agents</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-person"></i>
              </div>
            </div>
            </a>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>0</h3>
                <p>Guest</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
            </a>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{url('es/solved/complains')}}">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>0</h3>
                <p>All properties</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
            </a>
          </div>

          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <a href="{{url('es/unsolved/complains')}}">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>
                <p>Properties booked</p>
              </div>
              <div class="icon">
                <i class="ion ion-ios-folder"></i>
              </div>
            </div>
            </a>
          </div>
    </div>

</div>

@endsection