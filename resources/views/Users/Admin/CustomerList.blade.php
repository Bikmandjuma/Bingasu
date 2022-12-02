@extends('Users.Admin.cover')
@section('content')

<?php
	use App\Models\Customer;
	$customers=Customer::all();
	$customer_count=collect($customers)->count();
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
				<div class="card-header bg-info text-center" style="font-size:20px;"><span class="badge badge-light float-left">{{$customer_count}}</span> Customers list</div>
				<div class="card-body text-center" id="agents_data" style="overflow: auto;">
					<table class="table table-striped table-bordered">
						
						<thead>
							<tr>
								<th>N<sup>o</sup></th>
								<th>Fullname</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Booking</th>
								<th>View</th>
							</tr>
						</thead>

						<tbody>
							<?php
							$count=1;
							?>
							@foreach ($customer as $data)
								<tr>
									<td>{{$data->id}}</td>
									<td>{{$data->fullname}}</td>
									<td>{{$data->phone}}</td>
									<td>{{$data->email}}</td>
									<td>
										<?php

											$numbs=rand(1,$count);	
											if ($numbs%2 == 0) {
												echo '<span class="badge badge-info">Done</span>';
											}else{
												echo '<span class="badge badge-danger">Not yet</span>';
											}
										?>
										
									</td>
									<td>
										<a href="{{url('admin/view/customer')}}/{{Crypt::encryptString($data->id)}}"><i class="fa fa-eye"></i></a>
									</td>
								</tr> 
							@endforeach
								<tr class="text-center">
									<?php
									
										if ($customer_count == 0) {
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
						{{$customer->links()}}
						</div>
<!-- 					<div class="col-md-4"></div>
 -->				</div>
		
			</div>
		</div>
		<div class="col-md-1"></div>
	</div>
	
@endsection