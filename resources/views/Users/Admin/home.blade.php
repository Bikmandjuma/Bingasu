@extends('Users.Admin.cover')
@section('content')
<?php
    //import models
    use App\Models\Agent;
    use App\Models\Customer;
    use App\Models\PropertyType;

    //Counts number of agents
    $agent=Agent::all();
    $agent_count=collect($agent)->count();

    //Counts number of customers
    $customer=Customer::all();
    $customer_count=collect($customer)->count();

    //Counts number of properties type
    $property_type=PropertyType::all();
    $property_count=collect($property_type)->count();

    $rand=rand(100000,1000000);
    $id=Crypt::encryptString((auth()->guard('admin')->user()->id.$rand));
?>
<br>

<div class="container">
    
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$agent_count}}</h3>

                <p>Properties owner</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="{{url('admin/agent/list')}}/{{$id}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$customer_count}}</h3>

                <p>Customers</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{$property_count}}</h3>

                <p>Property types</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="{{url('admin/propertiesTypes')}}" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>0</h3>

                <p>All properties</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

</div>
@endsection