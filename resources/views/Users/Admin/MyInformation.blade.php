@extends('Users.Admin.cover')
@section('content')

  <?php
    $admin_id=auth()->guard('admin')->user()->id;
  ?>

<br>
<style type="text/css">
  #my_data p{
    float: left;
  }
</style>
<div class="container">
    <div class="row">
          <div class="col-sm-2 col-2"></div>
          <div class="col-sm-8 col-12">
            <div class="card">
            @foreach($info as $data)
              <div class="card-header text-center bg-info"><i class="fa fa-user f-w"></i>&nbsp;&nbsp;<b>Admin</b>&nbsp; info <a href="{{route('AdminEditinfo',Crypt::encryptString($admin_id))}}"><button class="btn btn-light float-right"><i class="fa fa-edit"></i> Edit</button></a></div>
              <div class="card-body" style="overflow: auto;">
                      <div class="row">
                        <div class="col-sm-6 text-center">
                            <img src="{{asset('images/admin/'.$data->image)}}" class="img-circle elevation-2" alt="User Image" style="width:80px;height:80px;border:2px solid skyblue;">
                        </div>

                        <div class="col-sm-6">
                          <hr>
                          <div class="row">
                            <div class="col-md-12">
                              <span id="my_data"><p><b>Firstname :&nbsp;</b></p><p class="text-info"><b> {{$data->firstname}}</b></p></span>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <span id="my_data"><p><b>Lastname :&nbsp;</b></p><p class="text-info"><b> {{$data->lastname}}</b></p></span>
                            </div>
                          </div>

                        </div>

                      </div>
                      

                      <hr>

                      <div class="row">
                        <div class="col-md-6">
                          <span id="my_data"><p><b>Gender :&nbsp;</b></p><p class="text-info"><b> {{$data->gender}}</b></p></span>
                        </div>

                        <div class="col-md-6">
                          <span id="my_data"><p><b>Phone :&nbsp;</b></p><p class="text-info"><b> {{$data->phone}}</b></p></span>
                        </div>
                      </div>

                      <hr>

                      <div class="row">
                        <div class="col-md-6">
                          <span id="my_data"><p><b>Email :&nbsp;</b></p><p class="text-info"><b> {{$data->email}}</b></p></span>
                        </div>

                        <div class="col-md-6">
                          <span id="my_data"><p><b>Nationality :&nbsp;</b></p><p class="text-info"><b> {{$data->nationality}}</b></p></span>
                        </div>
                      </div>

                  @endforeach
              </div>
            </div>
          </div>
          <div class="col-sm-2 col-2"></div>
    </div>
</div> 
@endsection