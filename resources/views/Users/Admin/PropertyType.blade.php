@extends('Users.Admin.cover')
@section('content')
@php
	use App\Models\PropertyType;
@endphp

<br>

<?php

$types=PropertyType::all();
$about_count=collect($types)->count();
?>

	
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">

			@if(session('success'))
			    <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
			      <strong>{{session('success')}}</strong>
			    </div><br>
			@endif

			<div class="card">
				<div class="card-header bg-info text-center" style="font-size:20px;">Properties types</div>
				<div class="card-body" style="overflow: auto;">
					
					<form action="{{route('CreatePropertyType')}}" enctype="multipart/form-data" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<label>image</label>
								<input type="file" name="image" class="form-control">
								<span class="text-danger">@error('image') {{$message}} @enderror</span>
							</div>
							<div class="col-md-6">
								<label>property name</label>
								<input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Enter name">
								<span class="text-danger">@error('name') {{$message}} @enderror</span>

							</div>
						</div>

						<br>
						<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp; Submit</button>
					</form>
 				</div>
			</div>
		</div>
	
	</div>
	
	
	<!--About us content-->
	<div class="row">
		<div class="col-md-12">

			<div class="row">
				@foreach($types as $data)
					<div class="col-md-2">
						<div class="card" style="float: left;">
							<div class="card-header bg-secondary text-center" style="font-size:20px;"><b><i class="fa fa-home"></i>&nbsp;{{$data->name}}</b></div>
								<div class="card-body text-center">
									<img src="{{asset('images/AboutUs/'.$data->image)}}" width="100" height="100">
								
								</div>

								<div class="card-body text-center">
								<i class="fa fa-edit text-primary float-left"></i>
								<i class="fa fa-trash text-danger float-right"></i>
								</div>
								
						</div>
					</div>
				@endforeach
			</div>

		</div>
	</div>
	<!--End of  the about us content-->

@endsection
