@extends('dashboard.admin.layout.layout')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">CMS Pages</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">CMS Pages</li>
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
                @if($pageModule['full_access']==1)
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">CMS Table</h3>
                  <a style="max-width: 150px; float: right;display:inline-block" href="{{ url('add-edit-cms-page') }}" 
                  class="btn btn-block btn-primary"> Add CMS Page</a>
                </div>
                @endif
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="cmspages" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Title</th>
                      <th>URL</th>
                      <th>Created On</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($cmsPages as $page )
                            

                    <tr>
                      <td maxlength="10">{{ $page['id'] }}</td>
                      <td maxlength="10">{{ $page['title'] }}</td>
                      <td maxlength="10">{{ $page['url'] }}</td>
                      <td>{{date("F j, Y, g:i a", strtotime( $page['created_at'])); }}</td>
                      <td>    

                        @if($pageModule['edit_access']==1||$pageModule['full_access']==1)
                        
                          @if($page['status']==1)
                               <a class="updateCmsPageStatus" id="page_{{ $page['id'] }}" page_id="{{ $page['id'] }}"
                               herf="javascript:void(0)">  <i class="fas fa-toggle-on" style="color: rgb(0, 115, 255)" status="Active"></i></a>
                          @else
                              <a class="updateCmsPageStatus" id="page_{{ $page['id'] }}" style="color: gray" page_id="{{ $page['id'] }}"
                              herf="javascript:void(0)">  <i class="fas fa-toggle-off" status="Inactive"></i></a>
                          @endif
                          &nbsp;   &nbsp;
                          @endif
                          @if($pageModule['edit_access']==1||$pageModule['full_access']==1)
                              <a href="{{ url('add-edit-cms-page/'.$page['id']) }}"> <i class="fas fa-edit"></i>
                                &nbsp;   &nbsp;
                          @endif
                          @if($pageModule['full_access']==1)
                              <a href="{{ url('delete-cms-page/'.$page['id']) }}" class="confirmDelete" name="CMS Page" title="Delete CMS Page" style="color: red"> <i class="fas fa-trash"></i>
                          
                          @endif
                    </td>
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