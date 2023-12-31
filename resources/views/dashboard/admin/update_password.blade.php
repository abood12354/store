@extends('dashboard.admin.layout.layout')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Update Password</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Update Admin Password</h3>
              </div>
              @if ($errors->any())

              @foreach ($errors->all() as $error)
              
              <span style="color: red;">{{ $error }}</span>
              
              @endforeach
              
              @endif
              <!-- /.card-header -->
            @if(Session::has('error_message'))
            <div class="alert alert-danger alert-dissible fade show" role="alert">
            <Strong>Error: </Strong>{{ Session::get('error_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              @php
              Session::forget('error_message');
              @endphp
            </button>

            </div>
            @endif

            @if(Session::has('success_message'))
            <div class="alert alert-success alert-dissible fade show" role="alert">
            <Strong>success: </Strong>{{ Session::get('success_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
              @php
              Session::forget('success_message');
              @endphp
            </button>
            </div>
            @endif
              <!-- form start -->
              <form method="post" action="{{ url('update-password') }}">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="admin_email">Email address</label>
                    <input  class="form-control" id="exampleInputEmail1" value= "{{ Auth::guard('admin')->user()->email }}"
                    readonly="" style="background-color: #cccc"
                    >
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Current Password</label>
                    <input type="password" class="form-control" name="current_pwd" id="current_pwd" placeholder="Current Password">
                    <span id="verifyCurrentPwd"></span>
                </div>
                <!-- /.card-body -->
                <div class="form-group">
                  <label for="exampleInputPassword1">New Password</label>
                  <input type="password" class="form-control" name="new_pwd" id="new" placeholder="New Password">

              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Confirm New Password</label>
                <input type="password" class="form-control" name="confirm_pwd" id="confirm_pwd" placeholder="Confirm Password">

            </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection