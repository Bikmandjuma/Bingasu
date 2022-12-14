@extends('Users.Admin.cover')
@section('content')
@php
	use App\Models\Contact;
@endphp

<?php

  //Contact mailbox
  $all_mails=Contact::all();
  $all_mail_count=collect($all_mails)->count();

	//Contact mailbox
	$mails=Contact::all()->where('deleted',null)->where('unread',null);
	$mail_count=collect($mails)->count();


  //Contact trashed mail
  $Trashed_mail=Contact::all()->where('deleted','deleted');
  $trashedmail_count=collect($Trashed_mail)->count();

  //encription of admin id
  $rand=rand(100000,1000000);
  $id=Crypt::encryptString(auth()->guard('admin')->user()->id.$rand);

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Trashed Mail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Trashed Mail</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <div class="card card-primary card-outline">
              <div class="card-header">
                <h3 class="card-title">Folders</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <span class="badge bg-info">{{$all_mail_count}}</span>&nbsp;<i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item">
                    <a href="{{url('admin/contact/mailbox')}}/{{$id}}" class="nav-link">
                      <i class="fas fa-inbox"></i> Inbox
                      <span class="badge bg-primary float-right">{{$mail_count}}</span>
                    </a>
                  </li>
                  <li class="nav-item">
                    <a href="{{url('admin/mail/sent')}}" class="nav-link">
                      <i class="far fa-envelope"></i> Sent
                      <span class="badge bg-success float-right">0</span>
                    </a>
                  </li>
                  <li class="nav-item active">
                    <a href="{{url('admin/mail/trashed')}}" class="nav-link text-primary"  style="background-color: #eee;">
                      <i class="far fa-trash-alt"></i> Trash
                      <span class="badge bg-danger float-right">{{$trashedmail_count}}</span>
                    </a>
                  </li>
                </ul>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
            <div class="card">
              <!-- /.card-header -->
              
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="card card-primary card-outline">
            <div class="card-header">
              <h3 class="card-title">Trashed Mail</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm">
                  <input type="text" class="form-control" placeholder="Search Mail">
                  <div class="input-group-append">
                    <div class="btn btn-primary">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                </div>
              </div>
              <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-controls">
                <div class="btn-group">
                  
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm">
                  <i class="fas fa-sync-alt"></i>
                </button>
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  
                  @foreach($mail as $data)
                  <!--start of msg-->
                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <a href="{{url('admin/read/mail')}}/{{Crypt::encryptString($data->email)}}/{{Crypt::encryptString($data->id)}}" style="color: black;">
                          <button type="button" class="btn btn-default btn-sm">
    		                  <i class="far fa-eye"></i>
                        </a>
			              </button>
                      </div>
                    </td>

                    <?php
                    	if ($data->unread ==  "read") {
                    		?>
                    			<td class="mailbox-name">{{$data->name}}</td>
                    		<?php
                    	}else{
                    		?>
                    			<td class="mailbox-name"><a href="{{url('admin/read/mail')}}/{{Crypt::encryptString($data->email)}}/{{Crypt::encryptString($data->id)}}" style="color:blue;">{{$data->name}}</a></td>
                    		<?php

                    	}
                    ?>

                    <?php
                        $mail=$data->message;
                        $sms=substr($mail,0,15);
                        if (strlen($mail) >= 15) {
                            $message=$sms." . . . . .";
                        }else{
                            $message=$mail;
                        }
                    ?>
                   
                    <td class="mailbox-subject"><b>{{$data->subject}}</b> - {{$message}}
                    </td>
                    <td class="mailbox-date">{{$data->sent_time}}</td>
                  </tr>
                  <!--end of msg-->
                  @endforeach

                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.card-body -->
            <div class="card-footer p-0">
              <div class="mailbox-controls">
                <div class="float-right">
                  <span>paginate goes here !</span>
                </div>
                <!-- /.float-right -->
              </div>
            </div>
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->

@endsection