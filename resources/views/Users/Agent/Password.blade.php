@extends('Users.Agent.cover')
@section('content')

<br>
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-4" style="overflow:auto;">

	    @if(session('status'))
		      <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
		      <strong>{{session('status')}}</strong>
		      </div><br>
		@endif
		
		<div class="card">
			<div class="card-header text-center bg-info">Manage your pasword</div>
			<div class="card-body">
				<form action="{{route('Agentchangepassword')}}" method="POST">
				@csrf            

                            <div class="mb-3">
                                <label for="oldPasswordInput" class="form-label">Old Password</label>
                                <input name="old_password" type="password" class="form-control @error('old_password') is-invalid @enderror" id="oldPasswordInput"
                                    placeholder="Old Password" value="{{old('old_password')}}">
                                @if(session('error'))<span style="color:red;">{{session('error')}}</span> @endif
                                @error('old_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="newPasswordInput" class="form-label">New Password</label>
                                <input name="new_password" type="password" class="form-control @error('new_password') is-invalid @enderror" id="newPasswordInput"
                                    placeholder="New Password">
                                @error('new_password')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="confirmNewPasswordInput" class="form-label">Confirm New Password</label>
                                <input name="new_password_confirmation" type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror" id="confirmNewPasswordInput"
                                    placeholder="Confirm New Password">
                                <span class="text-danger">@error('new_password_confirmation') {{$message}} @enderror</span>
                            </div>
					<button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-save"></i>&nbsp; Save chenge</button>
				</form>

			
			</div>
		</div>
			
	</div>
	<div class="col-md-4"></div>
</div>

@endsection

