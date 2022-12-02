@extends('users.Admin.cover')
@section('content')
<br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="">
            @if(session('status'))
                    <div class="alert alert_success" style="text-align: center;"> <button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>
                      <strong>{{session('status')}}</strong>
                    </div><br>
            @endif

            <div class="card" style="border:2px solid skyblue;">
                <div class="card-header bg-info text-white text-center">
                    <h4>Edit & Update your info</h4>
                </div>
                <div class="card-body">

                    <form action="{{route('AdminUpdateInfo',$data->id)}}" method="POST">
                        @csrf
                        <input type="text" name="id" value="{{$data->id}}" hidden>

                        <div class="form-group mb-3">
                            <label for="">Firstname</label>
                            <input type="text" name="firstname" value="{{$data->firstname}}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Laststname</label>
                            <input type="text" name="lastname" value="{{$data->lastname}}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Gender</label>
                            @if($data->gender == "male")
                            <select name="gender" class="form-control">
                                <option value="{{$data->gender}}">Male</option>
                                <option value="female">Female</option>
                            </select>
                            @else
                             <select name="gender" class="form-control">
                                <option value="{{$data->gender}}">Female</option>
                                <option value="male">Male</option>
                            </select>
                            @endif
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Phone</label>
                            <input type="text" name="phone" value="{{$data->phone}}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">email</label>
                            <input type="text" name="email" value="{{$data->email}}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <label for="">Nationality</label>
                            <input type="text" name="nationality" value="{{$data->nationality}}" class="form-control">
                        </div>

                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary float-center"><i class="fa fa-save"></i> Save change</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection