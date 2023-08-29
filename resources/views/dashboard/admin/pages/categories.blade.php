@extends('dashboard.admin.layout.layout')
@section('content')
  
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Categories</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Categories</li>
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
                  @php
                  Session::forget('success_message');
                  @endphp
                </button>
                </div>
                @endif
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Categories Table</h3>
                    @if($categoriesModule['full_access']==1)
                  <a style="max-width: 150px; float: right;display:inline-block" href="{{ url('add-edit-category') }}" 
                  class="btn btn-block btn-primary">New Cetagory</a>
                </div>
                
                @endif
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="categories" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Parent Category</th>
                      <th>URL</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                     
                        @foreach ($categories as $category )
                        

                    <tr>
                      <td maxlength="10">{{ $category['id'] }}</td>
                      <td maxlength="10">{{ $category['category_name'] }}</td>
                      <td maxlength="10">
                      @if(isset($category['parentcategory']['category_name']))
                    {{$category['parentcategory']['category_name'] }}
                    @else
                    Super Category
                    @endif
                    
                      </td>
                      <td maxlength="10">{{ $category['url'] }}</td>
                    
                    
                    <td>    

                      @if($categoriesModule['edit_access']==1||$categoriesModule['full_access']==1)
                        
                          @if($category['status']==1)
                               <a class="updateCategoryStatus" id="category_{{ $category['id'] }}" category_id="{{ $category['id'] }}"
                               herf="javascript:void(0)">  <i class="fas fa-toggle-on" style="color: rgb(0, 115, 255)" status="Active"></i></a>
                          @else
                              <a class="updateCategoryStatus" id="category_{{ $category['id'] }}" style="color: gray" category_id="{{ $category['id'] }}"
                              herf="javascript:void(0)">  <i class="fas fa-toggle-off" status="Inactive"></i></a>
                          @endif
                          &nbsp;   &nbsp;
                           @endif
                           @if($categoriesModule['edit_access']==1||$categoriesModule['full_access']==1)
                              <a href="{{ url('add-edit-category/'.$category['id']) }}"> <i class="fas fa-edit"></i>
                                &nbsp;   &nbsp;
                    @endif
                    @if($categoriesModule['full_access']==1)
                              <a href="{{ url('delete-category/'.$category['id']) }}" class="confirmDelete" name="category Page" title="Delete category Page" style="color: red"> <i class="fas fa-trash"></i>
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