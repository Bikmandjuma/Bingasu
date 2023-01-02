@extends('Users.Admin.cover')
@section('content')

<?php
	use App\Models\AgentDeleteAccount;
	$AgentAccount=AgentDeleteAccount::all();
	$Agent_Count=collect($AgentAccount)->count();

	$agent_nationality=AgentDeleteAccount::all();
	$agent_unique=$agent_nationality->unique('nationality');
	$agent_nat_count=collect($agent_unique)->count();

	//encription of admin id
	$rand=rand(100000,1000000);
	$id=Crypt::encryptString(auth()->guard('admin')->user()->id.$rand);

?>
	<br>

	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">

			@if(session('delete'))
	            <div class="alert alert_error" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
	              <strong>{{session('delete')}}</strong>
	            </div><br>
	        @endif

	        <button class="btn btn-success" data-toggle="modal" data-target="#CountryModal"><i class="fa fa-home"></i>&nbsp;Countries&nbsp;<span class="badge badge-light">{{$agent_nat_count}}</span> </button>
	  
	        <br>
	        <br>
			<div class="card">
				<div class="card-header bg-success text-center" style="font-size:20px;"><span class="badge badge-light float-left">{{$Agent_Count}}</span>Agents Deleted their Accounts</div>
				<div class="card-body text-center" id="agents_data">
					<table class="table table-striped table-bordered">
						
						<thead>
							<tr>
								<th>N<sup>o</sup></th>
								<th>image</th>
								<th>Firstname</th>
								<th>Lastname</th>
								<th>Gender</th>
								<th>Country</th>
								<th>Action</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$count=1;
							?>
							@foreach ($agent as $data)
								<tr>
									<td>{{$count++}}</td>
									<td><img src="{{asset('images/agents/'.$data->image)}}" width="30" height="30" class="img-circle" style="border:1px solid skyblue;"></td>
									<td>{{$data->firstname}}</td>
									<td>{{$data->lastname}}</td>
									<td>{{$data->gender}}</td>
									<td>{{$data->nationality}}</td>
									<td>
										<a href="{{url('admin/view/agent')}}/{{Crypt::encryptString($data->id)}}"><i class="fa fa-eye"></i>View</a>
									</td>
								</tr> 
							@endforeach
								<tr class="text-center">
									<?php
									
										if ($Agent_Count == 0) {
										  	echo "<td colspan='7'>No data found !</td>";
										}

									?>
								</tr>
						</tbody>

					</table>
				
				</div>

					<div class="row">
<!-- 					<div class="col-md-4"></div>
 -->					<div class="col-md-12">
						<!--Pagination number-->
						{{$agent->links()}}
						</div>
<!-- 					<div class="col-md-4"></div>
 -->				</div>
		
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>

	<!--start of  Show countries -->
          <div class="modal" id="CountryModal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
              <div class="modal-content">
                <div class="modal-body text-left">
                  <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                  <h4>Owners properties location (country) &nbsp;<i class="fa fa-users"></i></h4>
                  Countries&nbsp;<span class="badge badge-info">{{$agent_nat_count}}</span>
                	<input type="text" name="search" id="myInput" class="form-control" placeholder="Search country name . . ." autofocus>
                </div><hr>
                <div class="modal-body" style="overflow:auto;">
 				  
                  <div class="actionsBtns">
                       
                       <table>
                       		@php
                       			$count=1
                       		@endphp
                       		<tbody id="myTable">
                       		@foreach($agent_unique as $country)

                       			@php
                       				$countr=AgentDeleteAccount::all()->where('nationality',$country->nationality);
                       				$count_country=collect($countr)->count();
                       			@endphp

								<tr>
									<td>{{$count++}}</td> 
									<td><a href="{{url('admin/agent/country')}}/{{Crypt::encryptString($country->nationality)}}">{{$country->nationality}}</a></td>
									<td><span class="badge badge-info">{{$count_country}}</span></td>
								</tr>
							@endforeach
							</tbody>
                       </table>

                  </div>

                </div>
              </div>
            </div>
          </div>
      <!--end of Show countries-->

      <script>
		$(document).ready(function(){
		  $("#myInput").on("keyup", function() {
		    var value = $(this).val().toLowerCase();
		    $("#myTable tr").filter(function() {
		      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
		    });
		  });
		});
	  </script>
	
@endsection