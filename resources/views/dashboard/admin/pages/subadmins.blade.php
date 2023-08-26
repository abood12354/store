@extends('dashboard.admin.layout.layout')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Sub Admins</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sub Admins</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <style>
      td {
        max-width: 200px;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
      }
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
                @if(Session::has('success_message'))
                <div class="alert alert-success alert-dissible fade show" role="alert">
                <Strong>success: </Strong>{{ Session::get('success_message') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
                @endif
  
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Sub Admins Table</h3>
                  <a style="max-width: 150px; float: right;display:inline-block" href="{{ url('add-edit-subadmin') }}" 
                  class="btn btn-block btn-primary"> Add Sub Admin</a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="subadmins" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Username</th>
                      <th>First Name</th>
                      <th>Last Name</th>
                      <th>Type</th>
                      <th>Email</th>
                      <th>Created On</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($subadmins as $subadmin )
                            

                    <tr>
                      <td maxlength="10">{{ $subadmin['id'] }}</td>
                      <td maxlength="10">{{ $subadmin['username'] }}</td>
                      <td maxlength="10">{{ $subadmin['firstName'] }}</td>
                      <td maxlength="10">{{ $subadmin['lastName'] }}</td>
                      <td maxlength="10">{{ $subadmin['type'] }}</td>
                      <td maxlength="10">{{ $subadmin['email'] }}</td>
                      <td>{{date("F j, Y, g:i a", strtotime( $subadmin['created_at'])); }}</td>
                      <td>
                        @if($subadmin['status']==1)
                      <a class="updateSubadminStatus" id="subadmin-{{ $subadmin['id'] }}" subadmin_id="{{ $subadmin['id'] }}"
                      herf="javascript:void(0)">  <i class="fas fa-toggle-on" style="color: rgb(0, 115, 255)" status="Active"></i></a>
                      @else
                      <a class="updateSubadminStatus" id="subadmin-{{ $subadmin['id'] }}" style="color: gray" subadmin_id="{{ $subadmin['id'] }}"
                      herf="javascript:void(0)">  <i class="fas fa-toggle-off" status="Inactive"></i></a>
                      @endif
                      &nbsp;   &nbsp;
                      <a href="{{ url('add-edit-subadmin/'.$subadmin['id']) }}"> <i class="fas fa-edit"></i>
                        &nbsp;   &nbsp;
                        <a href="{{ url('delete-subadmin/'.$subadmin['id']) }}" class="confirmDelete" name="sub admin" title="Delete Sun Admin" style="color: red"> <i class="fas fa-trash"></i>
                        </a>
                    </tr>
                    @endforeach
                   
                    </tbody>
                
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  @endsection