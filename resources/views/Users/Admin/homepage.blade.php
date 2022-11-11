@extends('Users.Admin.cover')
@section('content')

<br>
<div class="row">

	<div class="col-md-12">
		<div class="card">
			<div class="card-header text-center bg-info">Address,contact and social-media</div>
			<div class="card-body" style="overflow:auto;">
				<table class="table table-bordered table-striped">
					<thead>
						<tr>
							<th>Address</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Facebook</th>
							<th>Instagram</th>
							<th>Whatsapp</th>
							<th>Twitter</th>
							<th>Linkdin</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>	
						@foreach($data as $datas)
							  <tr>
							  	<td>{{$datas->address}}</td>
							  	<td>{{$datas->phone}}</td>
							  	<td>{{$datas->email}}</td>
							  	<td>{{$datas->facebook}}</td>
							  	<td>{{$datas->instagram}}</td>
							  	<td>{{$datas->whatsapp}}</td>
							  	<td>{{$datas->twitter}}</td>
							  	<td>{{$datas->linkdin}}</td>
							  	<td><a href="#{{$datas->id}}"><button class="btn btn-success float-right"><i class="fa fa-edit"></i>&nbsp;Edit</button></a></td>
							  </tr>
						@endforeach

					</tbody>
				</table>

			</div>
		</div>
	</div>

</div>

@endsection