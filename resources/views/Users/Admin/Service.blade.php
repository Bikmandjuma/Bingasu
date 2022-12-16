@extends('Users.Admin.cover')
@section('content')
@php
	use App\Models\Service;
@endphp

<br>

	<div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
        
			@if(session('service_added'))
			    <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
			      <strong>{{session('service_added')}}</strong>
			    </div><br>
			@endif
		</div>
        <div class="col-md-4"></div>
	</div>

<?php

$service=Service::all();
$service_count=collect($service)->count();

if ($service_count != 1) {
	?>
	<!--About us content-->
	<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">

			<div class="card">
				<div class="card-header bg-info text-center" style="font-size:20px;">Service content<button class="btn btn-light float-right"><a href=""><i class="fa fa-edit"></i>&nbsp;Edit</a></button> </div>
				<div class="card-body" id="agents_data">

					@foreach($service as $data)
						<div class="row">
							<div class="col-md-6">
								{{$data->name}}<br>
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
}elseif($service_count == 0){
	?>
	
	<div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="card card-outline card-info">
            <div class="card-header">
              <h3 class="card-title">
                Service content
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            	<form action="{{route('AddServiceData')}}" method="POST">
            	@csrf
		            <textarea id="summernote" name="content" rows="5" autofocus placeholder="enter service content"></textarea>
		            <br>
		            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>&nbsp;Submit</button>
              </form>
            </div>

          </div>
        </div>
        <div class="col-md-1"></div>
        <!-- /.col-->
    </div>

	<?php
}
?>
@endsection
