@extends('dashboard.admin.layout.layout')
@section('content')
  @php
      use App\Models\Category;
  @endphp
 <!-- Content Wrapper. Contains page content -->
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
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
            @if ($errors->any())

            @foreach ($errors->all() as $error)
            
            <span style="color: red;">{{ $error }}</span>
            
            @endforeach
            
            @endif
                <form name="categoryForm" id="categoryForm" @if(empty($category['id']))action="{{ url('add-edit-category') }}" 
                @else action="{{ url('add-edit-category/'.$category['id']) }}" @endif method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="name">Category Name*</label>
                        <input type="text" class="form-control" id="category_name" name ="category_name"placeholder="Enter Category Name" @if(!empty($category['category_name'])) value="{{$category['category_name']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="url">URL*</label>
                        <input type="text" class="form-control" id="url" name="url" placeholder="Enter Page Url" @if(!empty($category['url'])) value="{{$category['url']  }}" @endif>
                      </div>
                      <div class="form-group">
                        <label for="description">Description*</label>
                        <textarea class="form-control" rows="3" id="description" name="description" placeholder="Enter Page Description"  >@if(!empty($category['description'])) {{ $category['description']  }} @endif</textarea>
                      </div>
                      <div class="form-group">
                        <label for="parent_id" >Category Level*</label>
                        <select name="parent_id" class="form-control" >
                           
 
                            <option value="0">
                                Super Category
                            </option> 
                            @if (!empty($category['parent_id']))
                            <option selected="selected" value="{{ $category['parent_id'] }}" >
                              
                                    {{  Category::where('id',$category['parent_id'])->first()->category_name;}}
                            </option>
                                
                            @endif

                            @foreach ($getCategories as $cat )
                            @if($cat['id'] != $category['id'])
                                <option value="{{ $cat['id'] }}"> {{ $cat['category_name'] }}   </option>
                                @endif
                             @if(!empty($cat['subcategories']))
                             @foreach ($cat['subcategories'] as $subcategory ) 
                             @if($subcategory['id'] != $category['id'])
                                       <option value="{{ $subcategory['id'] }}"> &nbsp;&nbsp;&raquo;{{ $subcategory['category_name'] }} </option>
                                       @endif
                                @if(!empty($subcategory['subcategories']))
                                @foreach ($subcategory['subcategories'] as $subsubcat ) 
                                @if($subsubcat['id'] != $category['id'])
                                       <option value="{{ $subsubcat['id'] }}"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&raquo;&raquo;{{ $subsubcat['category_name'] }}   </option>
                                       @endif
                            @endforeach
                            @endif
                            @endforeach
                            @endif
                            @endforeach
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="name">Category Discount*</label>
                        <input type="number" class="form-control" id="category_discount" name ="category_discount"placeholder="Enter Category Discount" @if(!empty($category['category_discount'])) value="{{$category['category_discount']  }}" @else value="0" @endif>
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