@extends('Users.Admin.cover')
@section('content')
@php
	use App\Models\Contact;
@endphp

<?php

	//Contact mailbox
	$mails=Contact::all()->where('deleted',null)->where('unread',null);
	$mail_count=collect($mails)->count();

  //Contact mailbox
  $mailss=Contact::all()->where('deleted',null)->where('unread','read');
  $mails_count=collect($mailss)->count();

   //Contact mailbox
  $mail_all=Contact::all()->where('deleted',null);
  $mail_all_count=collect($mail_all)->count();

  //Contact trashed mail
  $Trashed_mail=Contact::all()->where('deleted','deleted');
  $trashedmail_count=collect($Trashed_mail)->count();

?>

    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inbox</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Inbox</li>
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
              <h3 class="card-title">Inbox</h3>

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

                <div class="float-right">
                  Unread <b>{{$mail_count}}</b>&nbsp;&nbsp;:&nbsp;&nbsp;Read <b>{{$mails_count}}</b>&nbsp;&nbsp;/&nbsp;&nbsp;all&nbsp;:&nbsp;<b>{{$mail_all_count}}</b>
                </div>
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  
                  @foreach($mail as $data)
                  <!--start of msg-->
                  <tr>
                    <td>
                      <div class="icheck-primary">
                        <a href="{{url('admin/delete/mail')}}/{{$data->id}}" style="color: black;">
                          <button type="button" class="btn btn-default btn-sm">
    		                  <i class="far fa-trash-alt"></i>
                        </a>
			              </button>
                      </div>
                    </td>

                    <?php
                    	if ($data->unread ==  "read") {
                    		?>
                    			<td class="mailbox-name"><a href="{{url('admin/read/mail')}}/{{$data->id}}/{{$data->email}}" style="color:black;">{{$data->name}}</a></td>
                    		<?php
                    	}else{
                    		?>
                    			<td class="mailbox-name"><a href="{{url('admin/read/mail')}}/{{$data->id}}/{{$data->email}}" style="color:blue;">{{$data->name}}</a></td>
                    		<?php

                    	}
                    ?>
                   
                    <td class="mailbox-subject"><b>{{$data->subject}}</b> - {{$data->message}}
                    </td>
                    <td class="mailbox-date">{{$data->sent_time}}</td>
                  </tr>
                  <!--end of msg-->
                  @endforeach

                    <!-- @if ($mails_count == 0)
                        <tr class="text-center">
                            <td>No mail found !</td>
                        </tr>
                    @endif -->
              
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