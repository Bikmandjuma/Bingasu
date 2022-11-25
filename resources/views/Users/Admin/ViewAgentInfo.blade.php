@extends('Users.Admin.cover')
@section('content')

<br>

<style>
	 #my_data p{
        display: inline-block;
    }
</style>
	@foreach($AgentInfo as $data)
	  <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">

          <div class="card">
            <div class="card-header text-center bg-info"><i class="fa fa-address-card"></i>&nbsp;information of <b>{{$data->firstname}}&nbsp;{{$data->lastname}}</b></div>
            <div class="card-body" style="overflow: auto;">

              <div class="row">
                  <div class="col-md-6 text-center">
                      <img src="{{asset('images/Agents/'.$data->image)}}" class="img-circle elevation-2" alt="User Image" style="width:100px;height:100px;border:1px solid skyblue;">
                  </div>

                  <div class="col-sm-6">
                      <hr>

                      <div class="row">
                        <div class="col-md-12">
                          <span id="my_data"><p><b>Firstname :&nbsp;</b></p><p class="text-info"><b>{{$data->firstname}}</b></p></span>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <span id="my_data"><p><b>Lastname :&nbsp;</b></p><p class="text-info"><b>{{$data->lastname}}</b></p></span>
                         </div>
                      </div>
                
                  </div>
              </div>
              
              <hr>

              <div class="row">
                  <div class="col-md-6">
                    <span id="my_data"><p><b>Gender :&nbsp;</b></p><p class="text-info"><b>{{$data->gender}}</b></p></span>
                  </div>

                  <div class="col-md-6">
                    <span id="my_data"><p><b>Phone :&nbsp;</b></p><p class="text-info"><b>{{$data->phone}}</b></p></span>
                  </div>
              </div>

              <hr>

              <div class="row">
                <div class="col-md-6">
                  <span id="my_data"><p><b>Email :&nbsp;</b></p><p class="text-info"><b>{{$data->email}}</b></p></span>
                </div>

                <div class="col-md-6">
                  <span id="my_data"><p><b>Nationality :&nbsp;</b></p><p class="text-info"><b>{{$data->nationality}}</b></p></span>
                </div>
              </div>

               <hr>

              <div class="row">
                <div class="col-md-6">
                  <span id="my_data"><p><b>All properties :&nbsp;</b></p><p class="text-info"><b>0</b></p></span>
                </div>

                <div class="col-md-6">
                  <span id="my_data"><p><b>Created period :&nbsp;</b></p><p class="text-info"><b>{{$data->created_at}}</b></p></span>
                </div>

              </div>
            
            </div>
          </div>
          
          <!--end of card-->
        </div>
        <div class="col-md-2"></div>
      </div>

	@endforeach
@endsection