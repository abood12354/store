@extends('dashboard.admin.layout.layout')
@section('content')
  @php
                  use App\Models\Category;
  @endphp
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Products</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('dashboard') }}">Home</a></li>
              <li class="breadcrumb-item active">Products</li>
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
                    <h3 class="card-title">Products Table</h3>
          
                  <a style="max-width: 150px; float: right;display:inline-block" href="{{ url('add-edit-product') }}" 
                  class="btn btn-block btn-primary">New Product</a>
                     </div>
                
         
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="products" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Name</th>
                      <th>Category</th>
                      <th>Quantity</th>
                      <th>Price</th>
                      <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                     
                        @foreach ($products as $product )
                        

                    <tr>
                      <td maxlength="10">{{ $product['id'] }}</td>
                      <td maxlength="10">{{ $product['name'] }}</td>
                      <td maxlength="10"> {{ Category::where('id',$product['catagory_id'])->first()->category_name }}</td>
                      <td maxlength="10">{{ $product['quantity'] }}</td>
                      <td maxlength="10">{{ $product['price'] }}</td>
                    
                    <td>    
                           
                              <a href="{{ url('add-edit-product/'.$product['id']) }}"> <i class="fas fa-edit"></i>
                                &nbsp;   &nbsp;
                    
                              <a href="{{ url('delete-product/'.$product['id']) }}" class="confirmDelete" name="product Page" title="Delete category Page" style="color: red"> <i class="fas fa-trash"></i>
                                
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