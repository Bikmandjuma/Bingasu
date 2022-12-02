@extends('Users.Admin.cover')
@section('content')

@php
	use App\Models\Contact;

	$data=Contact::find($ids);
@endphp

<?php
	$mails=Contact::all()->where('deleted',null)->where('unread',null);
	$mail_count=collect($mails)->count();

	//Contact trashed mail
	$Trashed_mail=Contact::all()->where('deleted','deleted');
	$trashedmail_count=collect($Trashed_mail)->count();
?>
	
	<!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Read Mail</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Read Mail</li>
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
                    <i class="fas fa-minus"></i>
                  </button>
                </div>
              </div>
              <div class="card-body p-0">
                <ul class="nav nav-pills flex-column">
                  <li class="nav-item active">
                    <a href="{{url('admin/contact/mailbox')}}" class="nav-link text-primary"  style="background-color: #eee;">
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
                  <li class="nav-item">
                    <a href="{{url('admin/mail/trashed')}}" class="nav-link">
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
              <h3 class="card-title">Read Mail</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
              <div class="mailbox-read-info">
                <h5>Message Subject Is&nbsp;:&nbsp;{{$data->subject}}</h5>
                <h6>From&nbsp;:&nbsp;{{$data->email}}
                  <span class="mailbox-read-time float-right">{{$data->sent_date}}&nbsp;{{$data->sent_time}}</span></h6>
              </div>
              <!-- /.mailbox-read-info -->
              <div class="mailbox-controls with-border text-center">
                <div class="btn-group">
                	<a href="{{url('admin/delete/mail')}}/{{$data->id}}" style="color: black;">
	                  <button type="button" class="btn btn-default btn-sm" data-container="body" title="Delete">
	                    <i class="far fa-trash-alt"></i>
	                  </button>
                  	</a>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm" title="Print">
                  <i class="fas fa-print"></i>
                </button>
              </div>
              <!-- /.mailbox-controls -->
              <div class="mailbox-read-message">
                <p>Hello {{$data->name}},</p>

                <p>&nbsp;&nbsp;&nbsp;{{$data->message}}.</p>

                <p>Thanks,<br> {{$data->name}} </p>
              </div>
              <!-- /.mailbox-read-message -->
            </div>
            <!-- /.card-footer -->
            <div class="card-footer">
              <div class="float-right">
                <button type="button" class="btn btn-default"  data-toggle="modal" data-target="#msg_Modal"><i class="fas fa-reply"></i> Reply</button>
              </div>
              <button type="button" class="btn btn-primary"><i class="far fa-eye"></i> Viewed</button>
            </div>
            <!-- /.card-footer -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      </div><!-- /.container-fluid -->

        	<!--Message modal-->
        	<!--Add new task model-->
            <div class="modal fade" id="msg_Modal" role="dialog">
             <div class="modal-dialog">
                          
               <!-- Modal content-->
               <div class="modal-content">
                 <div class="modal-header bg-info" style="text-align: center;">
                   <h2>Reply to <b>{{$data->name}}</b></h2>
                 </div>
                 <div class="modal-body">
                   <form class="form-group" method="POST" action="">
                    <label><i class="fa fa-envelope"></i>&nbsp;email</label>
                     <input type="text" name="email" placeholder="Enter firstname" class="form-control" required disabled value="{{$data->email}}"><br>

                    <label><i class="fa fa-location"></i>&nbsp;Subject</label>
                     <input type="text" name="subject" placeholder="Enter subject" class="form-control" required autofocus><br>

                     <label><i class="fa fa-paper-plane"></i>&nbsp;Message</label>
                     <textarea name="msg" rows="3" id="summernote" placeholder="Typing message . . . . . ." class="form-control" autofocus required></textarea><br>
                   
                     <button type="submit" class="btn btn-primary float-left" name="submit">Send&nbsp;<i class="fa fa-chevron-right"></i></button>

                     <button type="reset" class="btn btn-danger float-right" class="close" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;Close</button>

                   </form>
                 </div>
              </div>

             <!--end of Modal content-->

    </section>
    <!-- /.content -->

@endsection