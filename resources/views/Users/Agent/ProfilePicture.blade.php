@extends('Users.Agent.cover')
@section('content')

<br>
<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4" style="overflow:auto;">

      @if(session('profile_changed'))
            <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
            <strong>{{session('profile_changed')}}</strong>
            </div><br>
      @endif

      @if(session('profile_error'))
            <div class="alert alert_error" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
            <strong>{{session('profile_error')}}</strong>
            </div><br>
      @endif
    
    <div class="card">
      <div class="card-header text-center bg-info"><strong>{{auth()->guard('agent')->user()->firstname}}</strong> profile picture</div>
      <div class="card-body">
          <div class="row">
            <div class="col-md-12 text-center">
                <img src="{{asset('images/agents/'.auth()->guard('agent')->user()->image)}}" style="width:150px;height:150px;border:2px solid gray;">
            </div>
          </div>
          <br>
          <div class="row">
            <div class="col-md-12 text-center">
                <button class="btn btn-primary" data-toggle="modal" data-target="#profile"><i class="fa fa-edit"></i>&nbsp; Edit</button>
            </div>
          </div>
      </div>
    </div>
      
  </div>
  <div class="col-md-4"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="profile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">Modify your profile picture</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{route('AgentChangeProfile')}}" method="POST" enctype="multipart/form-data">
            @csrf            
            <img id="blah" style="width:120px;height:120px;border:1px solid gray;border-radius:5px;" src="{{URL::to('/')}}/images/agents/user.png" /><br>
            <input name="profile_picture" type="file" accept="image/*" id="imgInp" class="form-control" required><br>
            <button class="btn btn-primary" type="submit" name="submit"><i class="fa fa-save"></i>&nbsp; Save changes</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}
</script>

@endsection

