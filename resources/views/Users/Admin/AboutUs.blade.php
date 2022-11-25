@extends('Users.Admin.cover')
@section('content')
@php
	use App\Models\AboutUs;
@endphp

<br>

	

<?php

$about=AboutUs::all();
$about_count=collect($about)->count();

if ($about_count == 1) {
	?>

	<!--About us content-->
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">

		@if(session('about_added'))
		    <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		      <strong>{{session('about_added')}}</strong>
		    </div><br>
		@endif

			<div class="card">
				<div class="card-header bg-info text-center" style="font-size:20px;">About us content<button class="btn btn-light float-right"><a href=""><i class="fa fa-edit"></i>&nbsp;Edit</a></button> </div>
				<div class="card-body" id="agents_data">

					@foreach($about as $data)
						<div class="row">
							<div class="col-md-6">
								<img src="{{asset('images/AboutUs/'.$data->image)}}" width="350" height="350">
							</div>
							<div class="col-md-6">
								<i class="fa fa-location"></i>{{$data->property_address}}<br>
								{{$data->content}}<br><br>
								<div class="card-body bg-light">
									{{$data->property_owner_email}}&nbsp;&nbsp;&nbsp;
									{{$data->property_owner_phone}}
								</div>

							</div>
						</div>
					@endforeach

				</div>
			</div>

		</div>
		<div class="col-md-1"></div>
	</div>
	<!--End of  the about us content-->

	<?php
}elseif($about_count == 0){
	?>
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">

			<div class="card">
				<div class="card-header bg-info text-center" style="font-size:20px;">About us content</div>
				<div class="card-body" style="overflow: auto;">
					
					<form action="{{route('CreateAboutUs')}}" enctype="multipart/form-data" method="POST">
						@csrf
						<div class="row">
							<div class="col-md-6">
								<label>image</label>
								<input type="file" name="image" class="form-control">
								<span class="text-danger">@error('image') {{$message}} @enderror</span>
							</div>
							<div class="col-md-6">
								<label>property_address</label>
								<input type="text" name="address" class="form-control" value="{{old('address')}}">
								<span class="text-danger">@error('address') {{$message}} @enderror</span>

							</div>
						</div>

						<label>Content</label>
						<textarea rows="5" type="text" id="summernote" name="content" value="{{old('content')}}"></textarea>
						<span class="text-danger">@error('content') {{$message}} @enderror</span>

						<div class="row">
							<div class="col-md-6">
								<label>property_owner_email</label>
								<input type="text" name="email" class="form-control"  value="{{old('email')}}">
								<span class="text-danger">@error('email') {{$message}} @enderror</span>

							</div>
							<div class="col-md-6">
								<label>property_owner_phone</label>
								<input type="text" name="phone" class="form-control"  value="{{old('phone')}}">
								<span class="text-danger">@error('phone') {{$message}} @enderror</span>

							</div>
						</div>

						<div class="row">
							<div class="col-md-6">
								<label>property_long</label>
								<input type="text" name="longitude" class="form-control"  value="{{old('longitude')}}">
								<span class="text-danger">@error('longitude') {{$message}} @enderror</span>

							</div>
							<div class="col-md-6">
								<label>property_lat</label>
								<input type="text" name="latitude" class="form-control"  value="{{old('latitude')}}">
								<span class="text-danger">@error('latitude') {{$message}} @enderror</span>

							</div>
						</div>

						<br>
						<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp; Submit</button>
					</form>
 				</div>
			</div>
		</div>
	
	</div>
	
	<?php
}
?>
@endsection
