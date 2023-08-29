@extends('dashboard.admin.layout.layout')
@section('content')
  
 <!-- Content Wrapper. Contains page content -->
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
              <li class="breadcrumb-item active">{{ $title }}</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
      <div class="container-fluid">
        <div class="row mb-2">
         
         
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">


        <div class="card card-default">
          <div class="card-header">
            <h3 class="card-title">{{ $title }}</h3>


          </div>
          <!-- /.card-header -->
          <div class="card-body">
            @php
              dd($errors->all());
            @endphp
            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
                <form name="cmsForm" id="cmsForm" @if(empty($cmsPage['id']))action="{{ url('add-edit-cms-page') }}" 
                @else action="{{ url('add-edit-cms-page/'.$cmsPage['id']) }}" @endif method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="title">Titles*</label>
                        <input type="text" class="form-control" id="title" name ="title"placeholder="Enter Page Title" @if(!empty($cmsPage['title'])) value="{{$cmsPage['title']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="url">URL*</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Enter Page Url" @if(!empty($cmsPage['url'])) value="{{$cmsPage['url']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter Page Description"  >@if(!empty($cmsPage['description'])) {{ $cmsPage['description']  }} @endif</textarea>
                      </div>
                      <div class="form-group">
                        <label for="meta_title">Meta Title</label>
                        <input type="text" class="form-control" id="meta_title" name="meta_title" placeholder="Enter Meta Title" @if(!empty($cmsPage['meta_title'])) value="{{$cmsPage['meta_title']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="meta_description">Meta Description</label>
                        <input type="text" class="form-control" id="meta_description" name="meta_description" placeholder="Enter Meta Description" @if(!empty($cmsPage['meta_description'])) value="{{$cmsPage['meta_description']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="meta_keywords">Meta Keywords</label>
                        <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" placeholder="Enter Meta Keywords" @if(!empty($cmsPage['meta_keywords'])) value="{{$cmsPage['meta_keywords']  }}" @endif>
                      </div>
                     
                    </div>
                    <!-- /.card-body -->
    
                    <div>
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            
            <!-- /.row -->
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
           
          </div>
        </div>

      
    
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

@endsection