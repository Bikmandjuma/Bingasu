@extends('Users.Admin.cover')
@section('content')

<?php
	use App\Models\Agent;
	$agents=Agent::all();
	$agent_count=collect($agents)->count();
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

			<div class="card">
				<div class="card-header bg-info text-center" style="font-size:20px;">Properties owners</div>
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
									
										if ($agent_count == 0) {
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
	
@endsection